<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resume;
use App\Resume_skill;
use App\Libs\Common;
use App\Experience;
use App\Education;
use App\InternshipApplication;
use App\TrainingBatch;
use Validator;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('profile');
    }

    public function profile(Request $requests)
    {
    	$user = \Auth::user();
        $resume = $user->resume()->first();
        $skill_ids = $resume->skills()->pluck('resume_skill_id');

        $skills = $resume->has_skill()->get();
        return view('profile.index', compact('resume', 'user', 'skill_ids', 'skills'));
    }

    public function resume_create(Request $requests){
    	$user = \Auth::user();
        $skills = Resume_skill::all();

    	return view('profile.resume_create', compact('user', 'skills'));
    }

    public function resume_edit(Request $requests){
        $user = \Auth::user();
        $skills = Resume_skill::all();
        $resume = $user->findFirstOrCreateResume();
        $educations = $resume->educations()->get();
        $experiences = $resume->experiences()->get();
        $cr = $resume->character_references()->get();
        if($resume){
            $languages_ids = $resume->has_skill()->get()->pluck('id')->toArray();
        }else{
            $resume = new Resume;
            $languages_ids = array();
        }

        return view('profile.resume_edit', compact('user', 'skills', 'resume', 'languages_ids', 'educations', 'experiences', 'cr'));

    }

    public function resume_save(Request $request)
    {

        // dd($request->skills);
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'photo' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required',
            'spoken_language' => 'required',
            // 'ed_university' => 'required',
            // 'ed_from_month' => 'required',
            // 'ed_from_year' => 'required',
            // 'ed_to_month' => 'required',
            // 'ed_to_year' => 'required',
            'summary' => 'required',
            'objective' => 'required',
            'cr_company' => 'required',
            'cr_name' => 'required',
            'cr_phone_number' => 'required',
            // 'picture' => 'required',
        ],
        [
            'f_name.required' => 'Please enter your first name',
            'l_name.required' => 'Please enter your last name',
            'phone_number.required' => 'Please enter your valid phone number',
            'email.required' => 'Please enter valid email address',
            'birth_date.required' => 'Please enter your birthdate',
            'photo.required' => 'Photo required',
            'address1.required' => 'Please enter your first address',
            'address2.required' => 'Please enter your secondary address',
            'city.required' => 'Please enter your city',
            'country.required' => 'Please enter your country',
            'postal.required' => 'Please enter your postal',
            'spoken_language.required' => 'Please enter your spoken language',
            // 'ed_university.required' => 'Please enter your university',
            // 'ed_from_month.required' => 'month start',
            // 'ed_from_year.required' => 'year start',
            // 'ed_to_month.required' => 'month end',
            // 'ed_to_year.required' => 'year end',
            'summary.required' => 'Skill/Experience Summary required',
            'objective.required' => 'Objective required',
            'cr_company.required' => 'Company / University name required',
            'cr_name.required' => 'Company personnel name required',
            'cr_phone_number.required' => 'Company personnel number required',
        ]);

        $input = $request->except('photo','skills', '_token');
        $resume = $request->resume_id ? Resume::findOrFail($request->resume_id) : Resume::where('user_id',\Auth::user()->id)->first() ?? new Resume;
        $resume->fill($input);
        $resume->m_name = $request->m_name ?? '';
        $resume->other_skills = $request->other_skills ?? '';
        $resume->websites = $request->websites ?? '';
        $resume->seminars_attended = $request->seminars_attended ?? '';
        $resume->awards = $request->awards ?? '';
        $resume->save();

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            // $fileNameToStore = time().'.png';
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
        	$resume->photo = $fileNameToStore;
        	$resume->save();
        }

        if ($request->ex_company){
            $experience = new Experience;
            $experience->resume_id = $resume->id;
            $experience->fill($input)->save();
        }
        
        $eds = json_decode($request->educational_backgrounds);

        foreach($eds as $ed){
            $education = new Education;
            $education->resume_id = $resume->id;
            $education->ed_university = $ed->ed_university;
            $education->ed_program_of_study = $ed->ed_program_of_study;
            $education->ed_field_of_study = $ed->ed_field_of_study;
            $education->ed_from_year = $ed->ed_from_year;
            $education->ed_from_month = $ed->ed_from_month;
            $education->ed_to_year = $ed->ed_to_year;
            $education->ed_to_month = $ed->ed_to_month;

            $education->save();
        }


        if ($request->has('skills')) {
            $resume_skill_ids = $request->input('skills');
            foreach($resume_skill_ids as $resume_skill_id) {
                $resume->has_skill()->attach($resume_skill_id);
            }
        }
        return redirect(route('itp_applicant_profile'))->with('success', 'Registered you resume.');
    }

    public function resume_save_edit(Request $request)
    {

        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required',
            'spoken_language' => 'required',
            // 'ed_university' => 'required',
            // 'ed_from_month' => 'required',
            // 'ed_from_year' => 'required',
            // 'ed_to_month' => 'required',
            // 'ed_to_year' => 'required',
            'summary' => 'required',
            'objective' => 'required',
            // 'cr_company' => 'required',
            // 'cr_name' => 'required',
            // 'cr_phone_number' => 'required',
            // 'picture' => 'required',
        ],
        [
            'f_name.required' => 'Please enter your first name',
            'l_name.required' => 'Please enter your last name',
            'phone_number.required' => 'Please enter your valid phone number',
            'email.required' => 'Please enter valid email address',
            'birth_date.required' => 'Please enter your birthdate',
            'address1.required' => 'Please enter your first address',
            'address2.required' => 'Please enter your secondary address',
            'city.required' => 'Please enter your city',
            'country.required' => 'Please enter your country',
            'postal.required' => 'Please enter your postal',
            'spoken_language.required' => 'Please enter your spoken language',
            // 'ed_university.required' => 'Please enter your university',
            // 'ed_from_month.required' => 'month start',
            // 'ed_from_year.required' => 'year start',
            // 'ed_to_month.required' => 'month end',
            // 'ed_to_year.required' => 'year end',
            'summary.required' => 'Skill/Experience Summary required',
            'objective.required' => 'Objective required',
            // 'cr_company.required' => 'Company / University name required',
            // 'cr_name.required' => 'Company personnel name required',
            // 'cr_phone_number.required' => 'Company personnel number required',
        ]);

        $input = $request->except('photo', 'skills', '_token');
        $resume = Resume::findOrFail($request->resume_id);

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $resume->photo = $fileNameToStore;
        }

        // $resume->photo = $fileNameToStore;
        $eds = json_decode($request->educational_backgrounds);

        foreach($eds as $ed){
            $education = isset($ed->id) ? Education::findOrFail($ed->id) : new Education;
            $education->resume_id = $resume->id;
            $education->ed_university = $ed->ed_university;
            $education->ed_program_of_study = $ed->ed_program_of_study;
            $education->ed_field_of_study = $ed->ed_field_of_study;
            $education->ed_from_year = $ed->ed_from_year;
            $education->ed_from_month = $ed->ed_from_month;
            $education->ed_to_year = $ed->ed_to_year;
            $education->ed_to_month = $ed->ed_to_month;

            $education->save();
        }

        $exps = json_decode($request->experiences);

        foreach($exps as $exp){
            $experience = isset($exp->id) ? Experience::findOrFail($exp->id) : new Experience;
            $experience->resume_id = $resume->id;
            $experience->ex_company = $exp->ex_company;
            $experience->ex_postion = $exp->ex_position;
            $experience->ex_explanation = $exp->ex_explanation;
            $experience->ex_from_year = $exp->ex_from_year;
            $experience->ex_from_month = $exp->ex_from_month;
            $experience->ex_to_year = $exp->ex_to_year;
            $experience->ex_to_month = $exp->ex_to_month;

            $experience->save();
        }

        $resume->fill($input)->save();

        $resume->has_skill()->detach();
        $resume_skill_ids = $request->input('skills');
        foreach($resume_skill_ids as $resume_skill_id){
            $resume->has_skill()->attach($resume_skill_id);
        }

        return redirect(route('itp_applicant_profile'))->with('success', 'Resume updated.');
    }

    public function editResumePhoto(Request $request){
        if($request->photo){
            $resume = Resume::findOrFail($request->resume_id);
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $resume->photo = $fileNameToStore;
            $resume->save();

            return ['message'=>'photo updated'];
        }
    }

    public function editCover(Request $request){
        if($request->photo){
            $user = \Auth::user();
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            $fileNameToStore = Common::resume_photo_name($user->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $user->cover_image = $fileNameToStore;
            $user->save();

            return ['message'=>'photo updated'];
        }
    }

    public function edit_resume_basic(Request $request){
        //
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'phone_number' => 'required',
            'email' => 'email',
            'birth_date' => 'required',
            // 'photo' => 'required',
            'address1' => 'required',
            // 'address2' => 'required',
            // 'city' => 'required',
            // 'country' => 'required',
            // 'postal' => 'required',
            'spoken_language' => 'required',
        ]);

        if($validator->fails()){
            return ['status'=>'failed', 'message'=>$validator->messages()];
        }

        $resume = \Auth::user()->findFirstOrCreateResume();

        $resume->update([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'm_name'=>$request->m_name,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'address1'=>$request->address1,
            'birth_date'=>$request->birth_date,
            // 'address2'=>$request->address2,
            // 'city'=>$request->city,
            // 'country'=>$request->country,
            // 'postal'=>$request->postal,
            // 'gender'=>$request->gender,
            'spoken_language'=>$request->spoken_language,
            // 'photo'=>$request->photo,
        ]);

        return ['status'=>'success'];
    }

    public function edit_resume_skills(Request $request){
        // 
        $resume = \Auth::user()->findFirstOrCreateResume();

        $resume_skills = Resume_skill::where('language',$request->language)->pluck('id');

        $resume->has_skill()->detach($resume_skills);
        $resume_skill_ids = $request->input('skills');
        if($resume_skill_ids)
        {
            foreach($request->skills as $resume_skill_id){
                $resume->has_skill()->attach($resume_skill_id);
            }
        }

        return ['status'=>'success', 'skills'=>$resume->has_skill()->where('language',$request->language)->get()];
    }

    public function edit_resume_meta(Request $request){
        // 
        $resume = \Auth::user()->findFirstOrCreateResume();

        if($request->has('value') && $request->has('col')){
            $resume->update([
                $request->col=>$request->value
            ]);
            return ['status'=>'success', 'resume'=>$resume];
        }
    }

    public function edit_resume_company_experience(Request $request){
        // 
        $validator = Validator::make($request->all(), [
            'ex_company' => 'required',
            'ex_postion' => 'required',
            'ex_from_month' => 'required',
            'ex_from_year' => 'required',
            'ex_to_month' => 'required',
            'ex_to_year' => 'required',
            'ex_explanation' => 'required',
            'id' => 'required',
        ]);

        if($validator->fails()){
            return ['status'=>'failed', 'message'=>$validator->messages];
        }

        $experience = Experience::findOrFail($request->id);
        $experience->update([
            'ex_company'=>$request->ex_company,
            'ex_postion'=>$request->ex_postion,
            'ex_from_month'=>$request->ex_from_month,
            'ex_from_year'=>$request->ex_from_year,
            'ex_to_month'=>$request->ex_to_month,
            'ex_to_year'=>$request->ex_to_year,
            'ex_explanation'=>$request->ex_explanation,
            'resume_id'=>$request->resume_id
        ]);

        return ['status'=>'success', 'experience'=>$experience];
    }

    public function j_c_r_p_experience(Request $request){
        // 
        $validator = Validator::make($request->all(), [
            'ex_company' => 'required',
            'ex_postion' => 'required',
            'ex_from_month' => 'required',
            'ex_from_year' => 'required',
            'ex_to_month' => 'required',
            'ex_to_year' => 'required',
            'ex_explanation' => 'required',
        ]);

        if($validator->fails()){
            return ['status'=>'failed', 'message'=>$validator->messages()];
        }

        $fields = [
            'ex_company'=>$request->ex_company,
            'ex_postion'=>$request->ex_postion,
            'ex_from_month'=>$request->ex_from_month,
            'ex_from_year'=>$request->ex_from_year,
            'ex_to_month'=>$request->ex_to_month,
            'ex_to_year'=>$request->ex_to_year,
            'ex_explanation'=>$request->ex_explanation,
            'resume_id'=>$request->resume_id
        ];

        if($request->id){
            $experience = Experience::find($request->id)->update($fields);
            $experience = $request;
        }
        else{
            $experience = Experience::create($fields);
        }

        return ['status'=>'success', 'experience'=>$experience];
    }

    public function create_educational_background(Request $request){
        $education = Education::create([
            'ed_university'=>$request->ed_university,
            'ed_program_of_study'=>$request->ed_program_of_study,
            'ed_field_of_study'=>$request->ed_field_of_study,
            'ed_from_year'=>$request->ed_from_year,
            'ed_from_month'=>$request->ed_from_month,
            'ed_to_year'=>$request->ed_to_year,
            'ed_to_month'=>$request->ed_to_month,
            'resume_id'=>$request->resume_id,
        ]);

        return ['status'=>'success', 'education'=>$education];
    }

    public function j_e_r_p_educational_background(Request $request){
        $education = Education::find($request->id)->update([
            'ed_university'=>$request->ed_university,
            'ed_program_of_study'=>$request->ed_program_of_study,
            'ed_field_of_study'=>$request->ed_field_of_study,
            'ed_from_year'=>$request->ed_from_year,
            'ed_from_month'=>$request->ed_from_month,
            'ed_to_year'=>$request->ed_to_year,
            'ed_to_month'=>$request->ed_to_month,
            'resume_id'=>$request->resume_id,
        ]);

        return ['status'=>'success', 'education'=>$education];
    }

    public function j_c_r_p_educational_background(Request $request){
        $fields = [
            'ed_university'=>$request->ed_university,
            'ed_program_of_study'=>$request->ed_program_of_study,
            'ed_field_of_study'=>$request->ed_field_of_study,
            'ed_from_year'=>$request->ed_from_year,
            'ed_from_month'=>$request->ed_from_month,
            'ed_to_year'=>$request->ed_to_year,
            'ed_to_month'=>$request->ed_to_month,
            'resume_id'=>$request->resume_id,
        ];

        if($request->id){
            $education = Education::find($request->id)->update($fields);
            $education = $request;
        }
        else{
            $education = Education::create($fields);
        }

        return ['status'=>'success', 'education'=>$education];
    }

    public function returResume(Request $request){
        $resume = \Auth::user()->findFirstOrCreateResume();
        return $resume;
    }

    public function returResumeEducation(Request $request){
        return Education::findOrFail($request->id);
    }

    public function getLanguageCategorySkills(Request $request){
        $resume_skills = Resume_skill::where('language',$request->language)->get();
        $user_skills = \DB::table('joining_resume_skills')->where('resume_id',$request->resume_id)
        ->select('resume_skill_id')
        ->get();

        return ['resume_skills'=>$resume_skills, 'user_skills'=>$user_skills];
    }

    public function getResumeExperience(Request $request){
        return Experience::findOrFail($request->id);
    }

    public function getResumeAwardCertificate(Request $request){
        return \Auth::user()->findFirstOrCreateResume();
    }

    // resume parts delete function
    public function deleteEducation(Request $request){
        Education::find($request->id)->delete();
        return 'item deleted';
    }

    public function deleteExperience(Request $request){
        Experience::findOrFail($request->id)->delete();
        return 'item deleted';
    }

    public function uploadResumeFiles(Request $request){
        // 
        return \Auth::user()->saveResumeFile($request->file('resume_file'));
    }

    public function fetch_latest_notifications(Request $request){
        $notifications = \Auth::user()->notifications()->latest()->limit(1)->get();
        foreach($notifications as $key => $value){
            $notifications[$key]->internshipApplication = InternshipApplication::find(json_decode($value->meta_data)->app_id)->load('trainingBatch');
        }
        return ['notifications'=>$notifications];
    }

    public function fetch_notifications(Request $request){
        $notifications = \Auth::user()->notifications()->latest()->limit(5);
        if($request->latest_id)
        {
            $notifications->where('notifications.id','>',$request->latest_id);
        }
        $notifications = $notifications->get();
        foreach($notifications as $key => $value){
            $notifications[$key]->internshipApplication = InternshipApplication::find(json_decode($value->meta_data)->app_id)->load('trainingBatch');
        }
        return ['notifications'=>$notifications];
    }
}
