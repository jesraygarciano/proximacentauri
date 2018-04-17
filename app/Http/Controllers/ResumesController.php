<?php

namespace App\Http\Controllers;

use App\Resume;
use App\Resume_skill;
use App\User;
use App\Experience;
use App\Education;
use App\Libs\Common;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ResumesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('onlyapplicant', ['except' => ['index', 'show']]);
        $this->middleware('navbar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = \Auth::user();
        $skills = Resume_skill::all();

        return view('resumes.create', compact('user', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $resume = Resume::where('user_id',\Auth::user()->id)->first() ?? new Resume;
        $resume->fill($input)->save();

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
        return redirect('resumes/show')->with('success', 'Registered you resume');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = \Auth::user();
        $resume = Resume::where('user_id', \Auth::id())->where('is_active', 1)->where('is_master', 1)->get()->first();
        $skill_ids = array();
        // if ($resume->has_skill() != null) {
        $skill_ids = Common::resume_skill_ids_get($resume);
        // }

        $skills = $resume->has_skill()->get();
        // $skills = $resume->has_skill()->get()->where('language', 'PHP')->get();

        $age = Common::cal_age($resume->birth_date);
        $birth_date = Common::month_converted_date($resume->birth_date);

        return view('resumes/show', compact('resume', 'user', 'skill_ids', 'skills', 'age', 'birth_date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function edit($resume_id)
    public function edit($id)
    {
        /*$resume = Resume::findOrFail($resume_id);
        $languages_ids = $resume->has_skill()->get()->pluck('id')->toArray();
        return view('resumes.edit', compact('resume', 'languages_ids'));
        */
        $user = \Auth::user();
        // $user = Resume::findOrFail($id);
        // dd($user);
        $skills = Resume_skill::all();
        $resume = Common::get_master_resume();
        $educations = $resume->educations()->get();
        $experiences = $resume->experiences()->get();
        $cr = $resume->character_references()->get();
        // dd($educations);
        if($resume){
            // $resume = Resume::where('user_id', $user->id)->where('is_active', 1)->where('is_master', 1)->get()->first();
            $languages_ids = $resume->has_skill()->get()->pluck('id')->toArray();
        }else{
            $resume = new Resume;
            $languages_ids = array();
        }

        return view('resumes.edit', compact('user', 'skills', 'resume', 'languages_ids', 'educations', 'experiences', 'cr'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $resume_id)
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
        $resume = Resume::findOrFail($resume_id);

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

        if($request->photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->photo));
            $fileNameToStore = Common::resume_photo_name($resume->id);
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $resume->photo = $fileNameToStore;
        }

        // $resume->photo = $fileNameToStore;

        $resume->fill($input)->save();

        $resume->has_skill()->detach();
        $resume_skill_ids = $request->input('skills');
        foreach($resume_skill_ids as $resume_skill_id){
            $resume->has_skill()->attach($resume_skill_id);
        }

        return redirect('resumes/show')->with('success', 'Updated you resume');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
