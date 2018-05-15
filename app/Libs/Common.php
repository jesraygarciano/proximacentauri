<?php
// app/Libs/Common.php
namespace App\Libs;

use App\Opening;
use App\Resume;
use App\Company;
use Auth;

// use App\Curriculum;
// use App\ExamResult;
// use App\UserJoinCourse;
// use App\Time;
// use App\Level;
// use App\Role;
// use App\MainFunction;
// use App\IntroShow;
// use Carbon\Carbon;
// use DB;

class Common
{

    //country list
    public static function return_country_array() {

        $country_array = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        return $country_array;
    }

    public static function return_month_array() {
        $month = array(
                ""   => "Select",
                "01" => "January",
                "02" => "February",
                "03" => "March",
                "04" => "April",
                "05" => "May",
                "06" => "June",
                "07" => "July",
                "08" => "August",
                "09" => "September",
                "10" => "October",
                "11" => "November",
                "12" => "December"
            );

        return $month;
    }

    public static function cal_age($birth_date){
        $now_year = date("Y");
        $now_month = date("m");
        $now_day = date("d");
        $birth_year = substr($birth_date, 0,4);
        $birth_month = substr($birth_date, 5,2);
        $birth_day = substr($birth_date, 8,2);
        $diff_year = (int)$now_year - (int)$birth_year;
        $diff_month = (int)$now_month - (int)$birth_month;
        $diff_day = (int)$now_day - (int)$birth_day;
        $age = '';
        if ($diff_month > 0) {
            $age = $diff_year;
        }elseif ($diff_month < 0) {
            $age = $diff_year - 1;
        }elseif ($diff_year = 0) {
            if ($diff_day >= 0) {
                $age = $diff_year;
            }elseif ($diff_day < 0) {
                $age = $diff_year - 1;
            }
        }
        return $age;
    }

    public static function month_converted_date($date){
        $year = substr($date, 0,4);
        $month = substr($date, 5,2);
        $day = substr($date, 8,2);
        $months = array(
                    '01' => 'January',
                    '02' => 'February',
                    '03' => 'March',
                    '04' => 'April',
                    '05' => 'May',
                    '06' => 'June',
                    '07' => 'July',
                    '08' => 'August',
                    '09' => 'September',
                    '10' => 'October',
                    '11' => 'November',
                    '12' => 'December');

        if ($month == '00') {
            $date_converted = '';
        } else{
            $date_converted = $months[$month] . ' ' . $day . ',' . ' ' .$year;
        }

        // dd($date_converted);
        return $date_converted;

    }

    //
    public static function resume_skill_get($resume) {

        $skills = $resume->has_skill()->orderBy('id', 'asc')->get();

        $php = '';
        $ruby = '';
        $java = '';
        $python = '';

        foreach ($skills as $skill) {
            if($skill->language == 'php'){
                if($php == ''){
                    $php = $skill->category;
                }else{
                    $php .= ' / ' . $skill->category;
                }
            }elseif($skill->language == 'ruby'){
                if($ruby == ''){
                    $ruby = $skill->category;
                }else{
                    $ruby .= ' / ' . $skill->category;
                }
            }elseif($skill->language == 'java'){
                if($java == ''){
                    $java = $skill->category;
                }else{
                    $java .= ' / ' . $skill->category;
                }
            }elseif($skill->language == 'python'){
                if($python == ''){
                    $python = $skill->category;
                }else{
                    $python .= ' / ' . $skill->category;
                }
            }
        }

        $skill_languages = compact('php', 'ruby', 'java', 'python');

        return $skill_languages;
    }

    public static function resume_skill_ids_get($resume) {

        $skill_id = $resume->has_skill()->orderBy('resume_skill_id', 'asc')->lists('resume_skill_id');
        // dd($skill_id);

        return $skill_id;
    }

    public static function companies_that_user_have() {

        $user_id = \Auth::id();
        $company = Company::where('user_id', $user_id)->where('is_active', 1)->get();
        return $company;
        //return value is collection(object)
    }

    //getting ids for the companies that auth user created
    public static function company_ids_that_user_have() {

        $user_id = \Auth::id();
        $company = array();
        $company = Company::where('user_id', $user_id)->where('is_active', 1)->lists('id')->toArray();

        return $company;
        //return value is array
    }

    public static function get_master_resume() {

        $master_resume = Resume::where('user_id', Auth::id())->where('is_active', 1)->where('is_master', 1)->first();
        // dd($master_resume);

        return $master_resume;

    }

    public static function time_str_millisecond() {

        $msStr = substr(explode(".", (microtime(true) . ""))[1], 0, 3);
        $time_str_millisecond = date("Y_m_d_H_i_s" . "_" . $msStr);
        return $time_str_millisecond;

    }

    public static function resume_photo_name($resume_id) {

        $resume_photo_name = 'resume_photo_resume_id'. $resume_id . '_' . Common::time_str_millisecond().'.png';
        return $resume_photo_name;

    }

    public static function company_logo_name($company_id) {

        $company_logo_name = 'company_logo_company_id'. $company_id . '_' . Common::time_str_millisecond().'.png';
        return $company_logo_name;

    }

    public static function company_background_name($company_id) {

        $company_background_name = 'company_background_company_id'. $company_id . '_' . Common::time_str_millisecond().'.png';
        return $company_background_name;

    }































    public static function test($str) {
        dd($str);
    }

    public static function checkLevel($user) {
        $e_point = self::calcEpoint($user);
        if ($e_point == 0) {
          return 1;
        }
        $level = Level::where('total_e_point','<=', $e_point)->orderBy('level', 'desc')->first();

        return $level->level;
    }

    ////////////////////////////////////////////////////////////////
    // イントロ周り
    public static function getIntroShowLog($user, $page_id_string) {
        $log = IntroShow::where('user_id', $user->id)->where('page_id_string', $page_id_string)->first();
        if ($log) {
            $show_flag = true;
        } else {
            $intro_show = new IntroShow;
            $intro_show->user_id = $user->id;
            $intro_show->page_id_string = $page_id_string;
            $intro_show->save();

            $show_flag = false;
        }
        return $show_flag;
    }


    ////////////////////////////////////////////////////////////////
    // ログイン周り
    public static function insertLastAction($user) {
        // $id = $user['id'];
        // $count = UserLog::where('user_id', '=', $id)->count();
        // if ($count > 0) {
        //     $user_log = UserLog::where('user_id', '=', $id);
        //     $user_log->delete();
        // }

        // $today = Carbon::now();
        // $data = ['user_id'=>$id,
        //          'last_action_date'=>$today
        //         ];

        // UserLog::create($data);
    }

    ////////////////////////////////////////////////////////////////
    // 権限周り
    public static function isAuthCurriculum($user, $curriculum) {
        $role = Role::where('id', $user->role_id)->first();
        $curriculum_permission_level_id = $curriculum->permission_level_id;
        // dd($role); // ユーザーに与えられたroleの権限レベル hiroshi = 1
        // dd($curriculum_permission_level_id); // カリキュラムに与えられたpermission_level_id(role_id) curriculum_id 3 = 1
        if ($role->id >= $curriculum_permission_level_id) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAuthTime($user) {
        $permission = DB::table('authorizations')->where('role_id', $user->role_id)->where('main_function_id',2)->count();
        if ($permission) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAuthExam($user, $exam) {
        $permission = DB::table('authorizations')->where('role_id', $user->role_id)->where('main_function_id',3)->count();
        if ($permission) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAuthAdmin($user) {
        // $permission = DB::table('authorizations')->where('role_id', $user->role_id)->where('main_function_id',3)->count();
        $permission = $user->role_id;
        if ($permission == 5) {
            return true;
        } else {
            return false;
        }
    }

    // public static function changeZeroToOneRole($user, $num) {
    //     $user->role_id = $num;
    //     $user->save();
    // }

    public static function changeRole($user) {
        $join_course = $user->join_courses()->first();
        if ($join_course != null && $user->role_id !=5) {
            $today = Carbon::today();
            // $today = new Carbon('2017-06-12');
            $start_date = Carbon::parse($join_course['start_date']);
            $end_date = Carbon::parse($join_course['end_date']);
            if ($today->lt($start_date)) {
                // dd('入学前');
                $user->role_id = 2;
                $user->save();
            } elseif ($today->gte($start_date) && $today->lte($end_date)) {
                // dd('入学中');
                $user->role_id = 3;
                $user->save();
            } elseif ($today->gt($end_date)) {
                // dd('卒業済み');
                $user->role_id = 4;
                $user->save();
            }
        }
    }

    ////////////////////////////////////////////////////////////////
    // ランキング
    public static function checkRanking($users, $user_id) {
        $ranking = [];
        $rank = 0;
        $c = 1;
        foreach ($users as $user) {
            $id = $user->id;
            $name = $user->name;
            $profile_picture_path = 'seedkun.png';
            if ($user->profile_picture) {
                $profile_picture_path = $user->profile_picture->profile_picture_path;
            }
            $e_point = self::calcEpoint($user);
            $ranking[] = ['id' => $id, 'name' => $name, 'e_point' => $e_point, 'profile_picture_path' => $profile_picture_path];
        }

        // foreachで1つずつ値を取り出す
        $e_point_for_sort = [];
        foreach ($ranking as $key => $value) {
            $e_point_for_sort[$key] = $value['e_point'];
        }
        // array_multisortで'id'の列を昇順に並び替える
        array_multisort($e_point_for_sort, SORT_DESC, $ranking);

        foreach ($ranking as $rank_user) {
            if ($rank_user['id'] == $user_id) {
                $rank = $c;
            }
            $c++;
        }
        // dd($ranking);
        // dd($rank);

        return [$ranking, 'rank' => $rank];
    }


    ////////////////////////////////////////////////////////////////
    // 経験値
    public static function getCurrentEpoint($level) {
        $current_level = $level;
        $current_e_point = Level::where('level',$current_level)->get()->toArray();
        return $current_e_point[0]['total_e_point'];
    }

    public static function getNextLevelEpoint($level) {
        $next_level = $level + 1;
        $next_level_e_point = Level::where('level',$next_level)->get()->toArray();
        return $next_level_e_point[0]['total_e_point'];
    }

    public static function calcEpoint($user) {
        $e_point_by_time = self::calcEpointByTime($user);
        $e_point_by_exam = self::calcEpointByExam($user);

        $e_point = $e_point_by_time + $e_point_by_exam;
        return $e_point;
    }

    // 学習時間→経験値計算
    public static function calcEpointByTime($user) {
        $total_time_in_seconds = self::calcTotalTime($user);
        $e_point = floor($total_time_in_seconds / 60 / 60); // ③現在の学習時間から出した経験値
        return $e_point;
    }

    // Exam点数→経験値計算
    public static function calcEpointByExam($user) {
        // exam_resultsの中から、num1でuserのもののみ取得
        // $exam_results = ExamResult::where('user_id',$user->id)->where('number_of_taken',1)->get();
        // dd($exam_results->toArray());
        $exam_results = ExamResult::where('user_id',$user->id)->where('number_of_taken',1)->sum('result');
        // dd($exam_results);
        // 計算処理
        $e_point = $exam_results * 1;
        return $e_point;
    }

    public static function calcTotalTime($user) {
        $times = Time::where('user_id', $user->id)->orderBy('created_at', 'desc')->get()->toArray();
        $total_time_in_seconds = 0;
        for ($i=0; $i < count($times); $i++) {
            if ($times[$i]['time']) { //時間が存在するとき
                // 時間→秒に変換
                $t = self::h2s($times[$i]['time']);
                // echo $t . '<br>';
                // すべて足して合計秒数を算出
                $total_time_in_seconds = $total_time_in_seconds + $t;
            }
        }
        // $total_time_in_seconds = $this->s2h($total_time_in_seconds);
        return $total_time_in_seconds;
    }

    ////////////////////////////////////////////////////////////////
    // カリキュラム
    public static function calcCurriculumProgress($user) {
        $curriculums = Curriculum::all();
        $all_curriculum_count = $curriculums->count();
        $progress_curriculum = $user->curriculum_progress->count();
        // %に変換
        $total_percent = 100;
        $current_percent = ($progress_curriculum / $all_curriculum_count) * 100;
        $current_percent = round($current_percent);

        return ['all_curriculum_count' => $all_curriculum_count, 'progress_curriculum' => $progress_curriculum, 'total_percent' => $total_percent, 'current_percent' => $current_percent];
    }

    public static function calcCurriculumInfo($user, $curriculum) {
        $unit = Unit::where('id', $curriculum->unit_id); // カリキュラムの属するUnit HTML基礎
        $unit_curriculums = $unit->first()->curriculums; // unitに属するカリキュラムすべて
        $unit_curriculums_count = $unit->first()->curriculums->count(); // 上記カリキュラムすべての数をカウント

        $done_curriculum_count = 0; // Unitに属するカリキュラムへの完了数カウント
        foreach ($unit_curriculums as $unit_curriculum) {
            $cFlag = DB::table('curriculum_progress')->where('curriculum_id', $unit_curriculum->id)->where('user_id',$user->id)->count();
            if ($cFlag > 0) {
                $done_curriculum_count++;
            }
        }

        // $curriculumの完了した人すべて
        $total_done_count = DB::table('curriculum_progress')->where('curriculum_id', $curriculum->id)->count();

        // 自分が完了しているか
        $isFinish = false;
        foreach ($user->curriculum_progress as $curriculum_progress) {
            $pivot_id = $curriculum_progress->pivot->curriculum_id;
            if ($pivot_id == $curriculum->id) {
                $isFinish = true;
            }
        }

        // カリキュラム進捗
        $total_percent = 100;
        $current_percent = $done_curriculum_count / $unit_curriculums_count * 100;
        $current_percent = round($current_percent);

        return ['unit_curriculums_count' => $unit_curriculums_count,
                'done_curriculum_count' => $done_curriculum_count,
                'total_done_count' => $total_done_count,
                'isFinish' => $isFinish,
                'total_percent' => $total_percent,
                'current_percent' => $current_percent
                ];
    }

    ////////////////////////////////////////////////////////////////
    // 学習時間
    public static function calcTimeInfo($user, $times) {

        // dd(count($times));
        // dd($times);
        $today = Carbon::today();
        // $today = new Carbon('2017-04-30');

        $today_month = $today->month;

        $d_count = date('t', strtotime($today));
        // $total_time = '0:00:00';
        $total_time = 0;
        $all_day = []; // 指定した月の日付データをすべて取得し配列化
        for ($i=0; $i < $d_count; $i++) {
            $j = $i+1;
            $date = $today_month . '/' . $j;
            $all_day[$date] = '0:00:00';
        }

        $each_day_time = []; // $timesを['start_date1' => time1,'start_date2' => time2]
        // $tmp = Carbon::parse($times[0]['start_date']);
        $year = $today->year;
        $each_month_time = [];
        for ($i=0; $i < 12; $i++) {
            $month = $i + 1;
            $key = $year . '/' . $month;
            $each_month_time[$key ] = '0:00:00';
        }
        // dd($each_month_time);

        for ($i=0; $i < count($times); $i++) {
            // echo $times[$i]['time'] . '<br>';
            if ($times[$i]['time']) { //時間が存在する
                // 時間→秒に変換
                $t = self::h2s($times[$i]['time']);
                // echo $t . '<br>';
                // すべて足して合計秒数を算出
                $total_time = $total_time + $t;

                // $total_time = $this->getSumTime($total_time, $times[$i]['time']);
                $start_date = Carbon::parse($times[$i]['start_date']);
                $date1 = $start_date;
                $date2 = $start_date;

                if ($today_month == $date1->month) { //今月のデータのみ
                    $date1 = $date1->month . '/' . $date1->day;
                    if (isset($each_day_time[$date1])) { //既に存在する日付キーのデータの場合は時間を足す
                        $each_day_time[$date1] = self::getSumTime($each_day_time[$date1], $times[$i]['time']);
                    } else { //新規追加
                        $each_day_time[$date1] = $times[$i]['time'];
                    }
                }

                // yyyy/MMをキーにした配列を作成し、値を累積していく
                $date2 = $date2->year . '/' . $date2->month;
                if (isset($each_month_time[$date2])) { //既に存在するyyyy/MMキーのデータの場合は時間を足す
                    $each_month_time[$date2] = self::getSumTime($each_month_time[$date2], $times[$i]['time']);
                } else { //新規追加
                    $each_month_time[$date2] = $times[$i]['time'];
                }

            } else { // 時間が存在しなかった場合
                // $times[$i]['time'] = '0:00:00';
                // $total_time = $this->getSumTime($total_time, $times[$i]['time']);
            }
        }
        // dd($each_month_time);

        // 秒を時間に変換
        $total_time = self::s2h($total_time);

        $data = $all_day;
        foreach ($all_day as $a_key => $a_value) { //ふたつの配列を合体計算
            foreach ($each_day_time as $e_key => $e_value) {
                if ($a_key == $e_key) {
                    $data[$a_key] = self::getSumTime($a_value, $e_value);
                }
            }
        }

        // 0:00:00→00.00の形式に変換
        $all_date = array_keys($data);
        $all_time = array_values($data);

        // 累積時間用配列
        $accumulation_time = $all_time;

        for ($i=0; $i < count($all_time); $i++) {
            $tmp_data = explode(':', $all_time[$i]);
            $hours = (int)$tmp_data[0];
            $minutes = (int)$tmp_data[1]; // 60 → 100へ変換
            $seconds = (int)$tmp_data[2];
            $tmp_time = $hours . '.' . $minutes;
            $all_time[$i] = (float)$tmp_time;

            // 累積時間配列
            if ($i > 0) {
                $j = $i - 1;
                $accumulation_time[$i] = $accumulation_time[$j] + $all_time[$i];
            } else {
                $accumulation_time[$i] = $all_time[$i];
            }
        }
        // dd($accumulation_time);

        $each_month_key = array_keys($each_month_time);
        $each_month_value = array_values($each_month_time);
        for ($i=0; $i < count($each_month_key); $i++) {
            $tmp_data = explode(':', $each_month_value[$i]);
            $hours = (int)$tmp_data[0];
            $minutes = (int)$tmp_data[1]; // 60 → 100へ変換
            $seconds = (int)$tmp_data[2];
            $tmp_time = $hours . '.' . $minutes;
            $each_month_value[$i] = (float)$tmp_time;
        }
        $time_count = count($times);
        if ($time_count >= 5) {
            $time_count = 5;
        }

        return ['time_count' => $time_count,
                'total_time' => $total_time,
                'all_date' => $all_date,
                'all_time' => $all_time,
                'accumulation_time' => $accumulation_time,
                'each_month_key' => $each_month_key,
                'each_month_value' => $each_month_value
                ];
    }

    ////////////////////////////////////////////////////////////////
    // エクザム
    public static function calcExamInfo($user, $exam) {
        $exam_info = ExamResult::where('exam_id',$exam->id)->where('number_of_taken',1);
        $take_count = $exam_info->count(); // 回答者数
        $avg_result = round($exam_info->avg('result'), 1); // 平均点
        $max_result = $exam_info->max('result'); // 最高得点者 点数
        $self_result = '未解答'; // 自分の得点一回目
        foreach ($exam_info->get() as $eachExamInfo) {
            if ($eachExamInfo->user_id == $user->id) {
                $self_result = $eachExamInfo->result;
            }
        }

        return ['take_count' => $take_count,
                'avg_result' => $avg_result,
                'max_result' => $max_result,
                'self_result' => $self_result];
    }

    public static function calcExamEachUserAvg($user) {
        $exam_info = ExamResult::where('user_id',$user->id)->where('number_of_taken',1);
        $avg_result = round($exam_info->avg('result'), 1); // 平均点

        return $avg_result;
    }

    ////////////////////////////////////////////////////////////////
    // その他
    public static function s2h($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        // $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        // return $hms;
        $hm = sprintf("%02d:%02d", $hours, $minutes);
        return $hm;
    }

    public static function h2s($hours) {
        $t = explode(":", $hours);
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
        return ($h*60*60) + ($m*60) + $s;
    }

    public static function getSumTime($source_time, $add_time) {

        $source_times = explode(":", $source_time);
        $add_times = explode(":", $add_time);
        $seconds = $source_times[2] + $add_times[2];
        $minutes = $source_times[1] + $add_times[1];
        $hours = $source_times[0] + $add_times[0];

        if ($seconds >= 60) {
            $minutes = $minutes + 1;
            $seconds = $seconds - 60;
        }

        if ($minutes >= 60) {
            $hours = $hours + 1;
            $minutes = $minutes - 60;
        }
        $time = $hours . ':' . $minutes . ':' . $seconds;

        return $time;
    }
}
