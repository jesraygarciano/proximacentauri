<?php

namespace App\Services;
use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Socialite;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser,$media)
    {
        $account = SocialAccount::whereProvider($media)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            \Session::flash('no_role', 'social account created');

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $media
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                switch ($media) {
                    case 'facebook':
                        $_user = Socialite::driver($media)->fields([
                            'name',
                            'first_name',
                            'last_name',
                            'email',
                            'gender',
                        ])->userFromToken($providerUser->token);

                        $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'f_name' => $_user->user['first_name'],
                            'l_name' => $_user->user['last_name'],
                            'password' => md5(rand(1,10000)),
                        ]);
                        break;
                    case 'github':
                        $_user = Socialite::driver($media)->userFromToken($providerUser->token);

                        $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'f_name' => $_user->name,
                            'password' => md5(rand(1,10000)),
                        ]);
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}