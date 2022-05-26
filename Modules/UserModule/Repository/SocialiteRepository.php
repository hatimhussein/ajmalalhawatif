<?php
namespace Modules\UserModule\Repository;
use Modules\UserModule\Entities\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\ApiAuthHelper;
use Modules\UserModule\Transformers\UserResource;
use Auth;
class SocialiteRepository
{
  use ApiResponseHelper;
  use ApiAuthHelper;

  public function getRedirectUrlByProvider($provider): array
  {


    
    return [
          'redirectUrl' => Socialite::driver($provider)
              ->stateless() //      The stateless method may be used to disable session state verification. This is useful when adding social authentication to an API:
              ->redirect()
              ->getTargetUrl()
      ];
  }


  public function loginWithSocialite($provider)
  {

    try 
    {
      if(isset(request()->error))
       return redirect ('/');
      $userSocial = Socialite::driver($provider)->stateless()->user();
      dd($userSocial);
    } 
    catch (Exception $e) 
    {
        return redirect ('/');
    }



    if ($this->isSocialPresent($userSocial)) {
          $user = $this->searchUserByEmail($userSocial->email);

          
          if ($user) {
                Auth::login($user);
                return redirect('/');
            } else {

              $new_user = $this->createUser($userSocial,$provider);

              if ($new_user) {
                Auth::login($new_user);
                return redirect('/');
            }
              else {
                return redirect('/login');
              }
            }
      } else {

        return redirect('/login');


        
      }
  }


    public static function isSocialPresent($socialiteUser): bool
    {
      return $socialiteUser
          && isset($socialiteUser->email)
          && isset($socialiteUser->id);
    }
    public static function compareUserWithSocialite($user, $socialiteUser)
    {
        return Hash::check(
            $socialiteUser->email . $socialiteUser->id,
            $user->password
        );
    }


    private function searchUserByEmail($email): ?User
    {
        return User::where('email', $email)
            ->first();
    }


    function createUser($userSocial,$provider){
        $user = New User();
        $user->first_name=$userSocial->name;
        $user->email=$userSocial->email;
        $user->provider_id=$userSocial->id;

        $user->save();

        return $user;
}

}



?>
