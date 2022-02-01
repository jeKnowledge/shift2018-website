<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Socialite;
use Image;

class SocialAccountService
{


    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {

        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
          $photo = $providerUser->avatar;

          if ($provider === 'facebook') {
            $new_photo = preg_replace('/normal/','large',$photo);
          } else if ($provider === 'google') {
            $new_photo = preg_replace('/sz=50/','sz=500',$photo);
          } else if ($provider === 'github') {
            $new_photo = $photo;
          }

        $account = new SocialAccount(
            [
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]
        );

          $user = User::whereEmail($providerUser->getEmail())->first();

          if (!$user) {
            $user = User::createUser(
                [
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => 'SocialUsers'.date('YYmmddHHiiss').rand(6,11),
                    'photoPath' => $new_photo,
                ]
            );
          }

          $account->user()->associate($user);
          $account->save();

          return $user;
        }

    }


}
