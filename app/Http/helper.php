<?php

function test()
{
    echo("umetani");
}

function resume_skill_array($language){

    // $skill_id_array = App\Resume_skill::where('language', $language)->get()->pluck('id')->toArray();
    // // $skill_array_value = array_values($skill_array);
    // // $skill_array_value = array_column($skill_array, 'id', 'language');

    // $skill_category_array = App\Resume_skill::where('language', $language)->get()->pluck('category')->toArray();
    // // $skill_category_array = array_values($skill_category_array);

    // // dd($skill_id_array);
    // // dd($skill_collection);
    // $skill_array = array_combine($skill_id_array, $skill_category_array);

    // $a = 0;
    // $skill_array = array();
    // for ($i=0; $i < count($skill_collection) ; $i++) {
        // if ($i == 0) {
        //     $skill_array = array($skill_collection[$i]->language => $skill_collection[$i]->category);

        // }else{
        //     // $skill_array += array($skill_collection[$i]->language => $skill_collection[$i]->category);
        //     // dd($skill_array);
        //     $skill_array = array_merge($skill_array, array($skill_collection[$i]->language => $skill_collection[$i]->category));
        // }
        // $skill_array = $skill_array + array($skill->language => $skill->category);
        // if ($i == 0) {
        //     $skill_array = array($skill_collection[$i]->language => $skill_collection[$i]->category);
        // }else{
        //     $skill_array[$skill_collection[$i]->language] = $skill_collection[$i]->category;
        // }
        // $a += 1;
        //
        // $skill_add = array($skill_collection[$i]->language => $skill_collection[$i]->category);
        // $skill_array = array_merge($skill_add, $skill_array);
        //
        // $skill_add[$skill_collection[$i]->language] = $skill_collection[$i]->category;
        // $skill_array = array_merge($skill_array, $skill_add);
    // }
    // dd(count($skill_array));
    // dd($skill_array);
    // dd($skill_collection['3']);
    //
    // dd($skill_array);
    // $a = array(3, 5, 6);
    // dd($a);
    //

    $skill_array = App\Resume_skill::where('language', $language)->get();

    return $skill_array;
}

function main_languages() {
    $main_languages = array(
            "PHP",
            "Ruby",
            "Java",
            "C++",
            "Python",
            "Swift",
            "Go",
            "C#",
            "Javascript",
            "Node.js"
        );

    return $main_languages;
}

function main_languages_class_convert() {
    $main_languages = array(
            "PHP" => "php",
            "Ruby" => "ruby",
            "Java" => "java",
            "C++" => "cplus2",
            "Python" => "python",
            "Swift" => "swift",
            "Go" => "go",
            "C#" => "csharp",
            "Javascript" => "javascript",
            "Node.js" => "node-js"
        );

    return $main_languages;
}


function month_array() {
    $month = array(
            ""   => "Month",
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        );

    return $month;
}

function salary_ranges() {
    $salary_ranges = array(
            "1" => "less than Php 9,000",
            "2" => "Php 10,000 ~ Php 14,999",
            "3" => "Php 15,000 ~ Php 19,999",
            "4" => "Php 20,000 ~ Php 24,999",
            "5" => "Php 25,000 ~ Php 29,999",
            "6" => "Php 30,000 ~ Php 39,999",
            "7" => "Php 40,000 ~ Php 49,999",
            "8" => "Php 50,000 ~ Php 70,999",
            "9" => "Php 70,000 ~ Php 99,999",
            "10" => "Php 100,000 and above"
        );
    return $salary_ranges;
}

function year_array() {

    $year_array = array();
    $year_array_add = array();
    $a = date("Y");
    for ($i=0; $i < (date("Y") - 1900 + 1); $i++) {
        if ($i == 0) {
            $year_array = array("" => "Year");
         } else{
            $year_array += array($a => $a);
            $a -= 1;
         }
    }
    // $year_array = array_reverse($year_array);
    // dd($year_array);

    return $year_array;
}

function return_month($int){

    if ($int != 0) {
        $month = array(
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        );
        return $month[$int];
    } else{
        return $int;
    }


}

function get_language_ids($language){
    $ids = App\Resume_skill::where('language', $language)->pluck('id')->toArray();
    return $ids;
}

function return_category($id){

    $category = App\Resume_skill::findOrFail($id)->category;
    // dd($category);
    return $category;
}

function return_resume_Skills(){
    return \App\Resume_skill::all();
}

function return_master_resume($user){

    $master_resume = App\Resume::where('user_id', $user->id)->where('is_master', 1)->where('is_active', 1)->first();

    // $languages = $master_resume->has_skill()->get()->toArray();
    return $master_resume;
}

function available_time_convert() {
    $available_time_convert = array(
        1 => '1am',
        2 => '2am',
        3 => '3am',
        4 => '4am',
        5 => '5am',
        6 => '6am',
        7 => '7am',
        8 => '8am',
        9 => '9am',
        10 => '10am',
        11 => '11am',
        12 => '12pm',
        13 => '1pm',
        14 => '2pm',
        15 => '3pm',
        16 => '4pm',
        17 => '5pm',
        18 => '6pm',
        19 => '7pm',
        20 => '8pm',
        21 => '9pm',
        22 => '10pm',
        23 => '11pm',
        24 => '12am'
        );
    return $available_time_convert;
}

function date_convert($date_time){
    $converted_date = substr($date_time, 0, 10);
    return $converted_date;
}






























function delete_form($urlParams, $label)
{
    $form = Form::open(['method' => 'DELETE', 'route' => $urlParams]);
    $form .= Form::submit($label, ['class' => 'btn btn-danger btn-xs']);
    $form .= Form::close();
    return $form;
}

function format_date($date)
{
    $date = date_create($date);
    $date = date_format($date , 'Y-m-d');
    return $date;
}

function format_datetime($datetime)
{
    $datetime = date_create($datetime);
    $datetime = date_format($datetime , 'Y-m-d H:m:s');
    return $datetime;
}

function getStatus($user) {
    $today = \Carbon\Carbon::today();
    $status = '';
    if ($user->join_courses->toArray()) {
        $join_courses = $user->join_courses->toArray();
        // dd($join_courses);
        $start_date = Carbon\Carbon::parse($join_courses[0]['start_date']);
        $end_date = Carbon\Carbon::parse($join_courses[0]['end_date']);
        // dd($today->gte($start_date));
        if ($today->lte($start_date)) { // 今日 < 受講コースstart_date
            $status = '入学前';
        } elseif ($today->gte($start_date) && $today->lte($end_date)) { // 受講コースstart_date < 今日 < 受講コースend_date
            $status = '留学中';
        } elseif ($today->gte($end_date)) { // 受講コースend_date < 今日
            $status = '卒業済';
        }
    }

    return $status;
}

function getRegisterDiffInDays($user) {
    $today = \Carbon\Carbon::today();
    $registerDate = $user['created_at'];
    return $registerDate->diffInDays($today) + 1;
}

function getlastLoginDiffInDays($user) {
    $today = \Carbon\Carbon::today();
    $lastLogin = \Carbon\Carbon::parse($user->last_login_at);
    if ($lastLogin->year < 0) {
        return '未ログイン';
    }
    $lastLogin = $lastLogin->diffInDays($today);
    $lastLogin .= '日前';
    return $lastLogin;
}

function isLog() {
    $latest_time = App\Time::latest('created_at')->first();
    // end_dateが存在すればtrueを返す
    if ($latest_time->end_date) {
        return true;
    }
    return false;
}

function sumLogTime($user, $key) {
    $times = App\Time::where('user_id', $user->id)->orderBy('created_at', 'desc')->get()->toArray();
    $time_info = Common::calcTimeInfo($user, $times);
    return $time_info[$key];
}

function getSumTime($source_time, $add_time) {
    $source_times = explode(":", $source_time);
    $add_times = explode(":", $add_time);
    return date("H:i:s", mktime($source_times[0] + $add_times[0], $source_times[1] + $add_times[1], $source_times[2] + $add_times[2]));
}

function getExamAvg($user) {
    $avg_result = Common::calcExamEachUserAvg($user);
    return $avg_result;
}


function isAdmin($role) {
    // return isAdmin(App\Http\UsersController::isAdmin($role));
    if ($role == 5) {
        return true;
    }
    return false;
}

function isSelected($exam_id, $question_id) {
    $exam = App\Exam::findOrFail($exam_id);
    $sets = $exam->exam_question_sets()->get();
    if (count($sets) == 0) {
        return false;
    }
    foreach ($sets as $set) {
        if ($set['pivot']['question_id'] == $question_id) {
            return true;
        }
    }
    return false;
}

function isCurrent($str) {
    $uri = Request::path();
    $uri = explode('/', $uri);
    // dd($uri);
    if ($uri[0] == $str) {
        return 'active';
    } elseif ($uri[0] == 'curriculums' && $str == 'units') {
        return 'active';
    }
    return '';
}

function formatYmdHi($datetime_str) {
    if ($datetime_str == '') {
        return '学習中';
    }
    $d = explode(" ", $datetime_str);
    $t = explode(":", $d[1]);
    // dd($d[0]);
    $h = $t[0];
    if (isset($t[1])) {
        $m = $t[1];
    } else {
        $m = "0";
    }
    if (isset($t[2])) {
        $s = $t[2];
    } else {
        $s = "0";
    }
    $seconds = ($h*60*60) + ($m*60) + $s;

    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;
    $ymdhm = sprintf("%s %02d:%02d", $d[0], $hours, $minutes);
    return $ymdhm;
}

function formatHi($time_str) {
    $t = explode(":", $time_str);
    $h = $t[0];
    if (isset($t[1])) {
        $m = $t[1];
    } else {
        $m = "0";
    }
    if (isset($t[2])) {
        $s = $t[2];
    } else {
        $s = "0";
    }
    $seconds = ($h*60*60) + ($m*60) + $s;

    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds / 60) % 60);
    $seconds = $seconds % 60;
    $hm = sprintf("%02d:%02d", $hours, $minutes);
    return $hm;
}

?>
