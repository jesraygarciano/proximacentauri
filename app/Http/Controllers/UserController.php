<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Opening;
use App\Libs\Common;
use App\User;
use App\Scout;
use App\Company;
use App\Application;
use Carbon\Carbon;

// use Common;


class UserController extends Controller
{
    public function index(Request $requests){
        // 
        return view('user.index');
    }

    public function notifications(Request $requests){
    	return view('user.notifications');
    }

    public function json_get_scout_notification(Request $requests){
        $scouts = User::find($requests->user_id)->scouts()->orderBy('scouts.created_at','desc')->get();

        foreach ($scouts as $scout) {
            $scout->seen = 1;
            $scout->save();
        }

    	return $scouts->load('company');
    }

    public function json_get_application_notification(Request $requests){
        $applications = Company::find($requests->company_id)->applications;

        foreach ($applications as $application) {
            $application->seen = 1;
            $application->save();
        }

    	return $applications->load('user');
    }

    public function json_get_opening_notification(Request $requests){
    	$notifications = User::find($requests->user_id)->openingNotifications();
        $bookmarks = \DB::table('save_openings')->whereIn('opening_id',$notifications->pluck('opening_id'))->get();
    	$openings = Opening::whereIn('id',$notifications->pluck('opening_id'))->orderBy('created_at','desc')->get();

        foreach (User::find($requests->user_id)->openingNotifications()->get() as $notification) {
            $notification->seen = 1;
            $notification->save();
        }

    	return ['openings'=>$openings->load('company')->load('skill_requirements'), 'bookmarks'=>$bookmarks];
    }

    public function json_get_stat_notification(Request $requests){
        $scouts = User::find($requests->user_id)->scouts()->where('scouts.seen',0)->count();
        $applications = $requests->company_id ? Company::find($requests->company_id)->applications()->where('applications.seen',0)->count() : 0;
        $openings = User::find($requests->user_id)->openingNotifications()->where('seen',0)->count();

        return ['scouts'=>$scouts, 'applications'=>$applications, 'openings'=>$openings];
    }

    public function confirm_role(Request $requests){
        $user = \Auth::user();
        $user->role = $requests->role;
        $user->save();
        return redirect()->back();
    }
}