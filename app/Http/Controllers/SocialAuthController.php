<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect(Request $requests)
    {
        \Session::flash('re_url', $requests->re_url);
        return Socialite::driver($requests->media)->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callbackFacebook(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user(),'facebook');
        auth()->login($user);
        $re_url = \Session::get('re_url');
        return redirect()->to($re_url ? route($re_url) : '/');
    }

    public function callbackGithub(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('github')->user(),'github');
        auth()->login($user);
        $re_url = \Session::get('re_url');
        return redirect()->to($re_url ? route($re_url) : '/');
    }
}
