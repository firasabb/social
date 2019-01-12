<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

use \App\SocialAccount;
use \App\User;
use Storage;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider){

        return Socialite::driver($provider)->redirect();

    }

    public function handleProviderCallback($provider){

        $_user = Socialite::driver($provider)->user();

        $user = $this->processUser($provider, $_user);

        auth()->login($user, true);

        return redirect('/home');

    }

    public function processUser($provider, $socialiteUser){

        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }


        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);
            return $user;
        }


        $avatarLink = $socialiteUser->getAvatar();
        
        if(!$avatarLink){
            $avatarLink = 'https://i0.wp.com/caravetclinic.com/wp/wp-content/uploads/2016/07/person-icon-blue.png';
        }

        $user = new User();      
        $user->name = $socialiteUser->getName();
        $user->email = $socialiteUser->getEmail();
        $user->avatar = $avatarLink;
        $user->password = bcrypt(str_random(25));   
        $user->save();

        $this->addSocialAccount($provider, $user, $socialiteUser);

        return $user;

    }



    public function findUserBySocialId($provider, $id){

        $socialUser = SocialAccount::where('provider', $provider)->where('provider_id', $id)->first();
            
        if($socialUser){
            $user = $socialUser->user;
            return $user;
        }
        
        return false;
    }

    public function findUserByEmail($provider, $email){

        if($email){
            $user = User::where('email', $email)->first();
            return $user;
        }
        return null;
    }

    public function addSocialAccount($provider, $user, $socialiteUser){

        $socialAccount = new SocialAccount();
        $socialAccount->user_id = $user->id;
        $socialAccount->provider = $provider;
        $socialAccount->provider_id = $socialiteUser->getId();
        $socialAccount->token = $socialiteUser->token;
        $socialAccount->save();

    }

}
