<?php

namespace App\Http\Controllers;
use App\Libs\Common;
use App\Company;
use App\Application;
use App\Opening;
use App\User;
use App\Resume;
use App\InternshipApplicationSkills;
use App\InternshipApplication;
use App\TrainingBatch;
use App\Notification;
use Auth;
use Mapper;
use yajra\Datatables\Datatables;
use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InternshipApplicationController extends Controller
{

    public function landing_page(){

        // Mapper::map(10.318686,123.90317049999999);
        Mapper::map(10.318686,123.90317049999999,['zoom' => 19, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);

        return view('itp.landing_page');
    }

    public function create(){
        $batch = TrainingBatch::all();

        return view('intership-training-programming.applicant.create', compact('batch'));

    }

    public function save_application(Request $requests){


        if (!$requests->has('skills')) {
            $requests->skills = "";
        }

        $this->validate($requests,[
            'skills' => 'required',
            'objective' => 'required',
            'school' => 'required',
            'course' => 'required',
        ]);

        $application = InternshipApplication::create([
            'user_id'=>\Auth::user()->id,
            'objectives'=>$requests->objective,
            'school'=>$requests->school,
            'course'=>$requests->course,
            'batches'=>$requests->batch

        ]);


        foreach ($requests->skills as $skill) {
            $application->skills()->attach($skill);
        }

        return redirect()->route('applicant_profile');

    }

    public function applicant_index(){
        return view('intership-training-programming.applicant.index');
    }

    public function profile(){
           
        $student = \Auth::user()->intershipApplication()->get();

        return view('intership-training-programming.applicant.profile',compact('student','skill_ids'));

    }

    public function edit(Request $request){

        $batch = TrainingBatch::all();
        $student_id = $request->student_id;

        $student = $request->student_id ? InternshipApplication::find($request->student_id) : false;

        return view('intership-training-programming.applicant.edit',compact('student','batch'));

    }

    public function update_application(Request $requests){

        if (!$requests->has('skills')) {
            $requests->skills = "";
        }

        $this->validate($requests,[
            'skills' => 'required',
            'objective' => 'required',
            'school' => 'required',
            'course' => 'required',
        ]);

        $requests->user()->intershipApplication()->update([
            'user_id'=>\Auth::user()->id,
            'objectives'=>$requests->objective,
            'school'=>$requests->school,
            'course'=>$requests->course
        ]);

        return redirect()->route('applicant_profile');

    }


    public function json_get_application_datatable(Request $requests){
        $ids = \Auth::user()->intershipApplication()->pluck('internship_applications.id');

        return Datatables::of(InternshipApplication::query()->leftJoin('users','users.id','=','internship_applications.user_id')
            ->select(['internship_applications.id',\DB::raw('concat(users.f_name," ",users.l_name) as applicant_name'),'school','preffered_training_date','course'])->whereIn('internship_applications.id',$ids))
        ->make(true);
    }


    // management code
    public function manage_batch_index(){
        return view('intership-training-programming.management.index');
    }

    public function getBatchCreate($id = null){
        $batch = TrainingBatch::find($id);
        return view('intership-training-programming.management.create-batch', compact('batch'));
    }

    public function postBatchCreate(Request $requests){
        $this->validate($requests
            ,[
                'name'=>'required',
                'start_date'=>'required',
                'regitration_deadline'=>'required',
                'schedule'=>'required',
            ]
        );

        if(!$requests->batch_id)
        {
            $batch = TrainingBatch::create([
                'author_id'=>\Auth::user()->id,
                'name'=>$requests->name,
                'start_date'=>$requests->start_date,
                'regitration_deadline'=>$requests->regitration_deadline,
                'description'=>$requests->description,
                'schedule'=>$requests->schedule
            ]);
        }
        else
        {
            $batch = TrainingBatch::where('id',$requests->batch_id)->update([
                'author_id'=>\Auth::user()->id,
                'name'=>$requests->name,
                'start_date'=>$requests->start_date,
                'regitration_deadline'=>$requests->regitration_deadline,
                'description'=>$requests->description,
                'schedule'=>$requests->schedule
            ]);
        }

        return redirect()->route('itp_management_index');
    }

    public function json_get_batches_datatable(Request $requests){
        return Datatables::of(TrainingBatch::query())->make(true);
    }

    public function json_get_applicants_datatable(Request $requests){
        $internships = InternshipApplication::query();
        $internships = $requests->training_batch_id ? $internships->where('training_batch_id',$requests->training_batch_id) : $internships;

        return Datatables::of($internships
        ->leftJoin('users','users.id','=','internship_applications.user_id')
        ->leftJoin('training_batches','training_batches.id','=','internship_applications.training_batch_id')
        ->select([
            'internship_applications.id','users.photo',
            \DB::raw('training_batches.name as training_batch_name'),
            \DB::raw('concat(users.f_name," ",users.l_name) as applicant_name'),
            'school','preffered_training_date',
            'course',
            'internship_applications.created_at',
            "internship_applications.objectives",
            "internship_applications.status",
            "school",
            "course"
        ]))
        ->filterColumn('applicant_name', function($query, $keyword){
            $sql = "CONCAT(users.f_name,' ',users.l_name) like ? ";
            $query->whereRaw($sql, ["%{$keyword}%"]);
        })
        ->filterColumn('training_batch_name', function($query, $keyword){
            $sql = "training_batches.name like ? ";
            $query->whereRaw($sql, ["%{$keyword}%"]);
        })
        ->editColumn('photo', function($data) {
            if(!file_exists('storage/'.$data->photo) || str_replace(' ','',$data->photo) == ''){
                return asset('img/member-placeholder.png');
            }

            return asset('storage/'.$data->photo);
        })
        ->make(true);
    }

    public function json_update_application_status(Request $requests){
        $app = InternshipApplication::find($requests->id);
        $app->status = $requests->status;
        $app->setRemark($requests->remark);
        $app->save();

        $notification = Notification::create([
            'author_id'=>\Auth::user()->id,
            'recipient_id'=>$app->user_id,
            'status'=>'unseen',
            'explanation'=>$requests->remark,
            'meta_data'=>json_encode(['type'=>'itp_app','app_id'=>$app->id])
        ]);

        $notification->internshipApplication = $app->load('trainingBatch');

        event(new \App\Events\NotificationEvent(
            [
                'type'=>'internship_application_status',
                'event'=>$app->status,
                'notification'=>$notification,
                'user_id'=>$app->user_id
            ]
        ));

        \App\Jobs\ProcessEmail::dispatch([
            'blade'=>'emails.app-notification',
            'recipient'=>User::find($app->user_id),
            'sender'=>\Auth::user(),
            'remark'=>$requests->remark,
            'subject'=>'Nexseed Application Progress'
        ])->delay(now()->addMinutes(10));
    }

    public function json_view_application(Request $requests){
        return InternshipApplication::find($requests->id)->load('skills')->load('user')->load('trainingBatch');
    }

    public function json_delete_batch(Request $requests){
        TrainingBatch::find($requests->batch_id)->delete();

        return 'deleted';
    }

    public function json_edit_btach_is_active(Request $requests){
        $batch = TrainingBatch::findOrFail($requests->batch_id);

        $batch->is_active = $requests->is_active == 'true' ? 1 : 0;
        $batch->save();

        return $batch;
    }
}
