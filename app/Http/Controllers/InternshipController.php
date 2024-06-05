<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use App\InternshipApplication;
use App\TrainingBatch;
use App\Resume_skill;
use App\Libs\Common;

class InternshipController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create(Request $requests){

        if(\Auth::check()){
            $batches = TrainingBatch::isActive()->get();

            $student = $requests->id ? InternshipApplication::find($requests->id) : false;

            return view('intership-training-programming.applicant.create', compact('batches','student'));
        }
        else
        {
            return redirect()->to('/login?re_url=itp_create');
        }
    }

    public function add_batch(Request $requests){

        $batch = TrainingBatch::all();

        $student = $requests->id ? InternshipApplication::find($requests->id) : false;

        return view('intership-training-programming.applicant.add_batch', compact('batch','student'));

    }


    public function json_delete_application(Request $requests ){
        InternshipApplication::find($requests->id)->delete();

        return 'deleted';
    }

    public function userItpProfile(){
        $applications = \Auth::user()->intershipApplication()->limit(3)->get()->load('trainingBatch');
        $user = \Auth::user();

        $resume = $user->findFirstOrCreateResume();
        $skill_ids = $resume->skills()->pluck('resume_skill_id');

        $skills = $resume->has_skill()->get();

        // dd($user);
        return view('intership-training-programming.applicant.profile', compact('applications','user','resume','skills_ids','skills'));
    }

    public function save_application(Request $requests){

        if (!$requests->has('skills')) {
            $requests->skills = "";
        }

        $this->validate($requests,[
            'skills' => 'required',
            'objective' => 'required',
            // 'school' => 'required',
            // 'course' => 'required',
            'batch' => 'required',
        ]);

        $application;   
        if($requests->id){
            $application = InternshipApplication::find($requests->id);
            $application->update([
                'objectives'=>$requests->objective,
                // 'school'=>$requests->school,
                // 'course'=>$requests->course,
                'training_batch_id'=>$requests->batch
            ]);
        }
        else
        {
            if(\Auth::user()->intershipApplication()->where('training_batch_id',$requests->batch)->first()){
                return 'you already applied for this batch!';
            }

            $application = InternshipApplication::create([
                'user_id'=>\Auth::user()->id,
                'objectives'=>$requests->objective,
                'status'=>'application_submitted',
                // 'school'=>$requests->school,
                // 'course'=>$requests->course,
                'training_batch_id'=>$requests->batch
            ]);
        }

        $resume = \Auth::user()->findFirstOrCreateResume();
        $resume->has_skill()->detach();
        $application->skills()->detach();
        foreach ($requests->skills as $skill) {
            $application->skills()->attach($skill);
            $resume->has_skill()->attach($skill);
        }
        return redirect()->route('itp_applicant_profile');
    }

    public function save_batches(Request $requests){

        $this->validate($requests,[
            'batch' => 'required',
        ]);

        $application;
        if($requests->id){
            $application = InternshipApplication::find($requests->id);
            $application->update([
                'training_batch_id'=>$requests->batch
            ]);
        }
        else
        {
            $application = InternshipApplication::create([
                'user_id'=>\Auth::user()->id,
                'training_batch_id'=>$requests->batch
            ]);
        }

        return redirect()->route('itp_applicant_profile');
    }

    public function json_get_application_datatable(Request $requests){
        $ids = \Auth::user()->intershipApplication()->pluck('internship_applications.id');

        // return Datatables::of($companies)->make(true);
        return Datatables::of(InternshipApplication::query()
            ->leftJoin('training_batches','training_batches.id','=','internship_applications.training_batch_id')
            ->select([
                'internship_applications.id', 
                \DB::raw('training_batches.name as batch_name'),
                'internship_applications.created_at',
                'training_batches.start_date',
            ])->whereIn('internship_applications.id',$ids)
            ->where('training_batches.id','>',0)
        )
        ->filterColumn('batch_name', function($query, $keyword) {
            $query->whereRaw('training_batches.name like', ["%{$keyword}%"]);
        })
        ->editColumn('created_at', function($data) {
            return date('M. d, Y h:i:sa',strtotime($data['created_at']));
        })
        ->editColumn('start_date', function($data) {
            return date('M. d, Y',strtotime($data['start_date']));
        })
        ->make(true);
    }
}
