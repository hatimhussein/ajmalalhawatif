<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Repository\SocialiteRepository;


class SocialLoginController extends Controller
{
    private $socialiterepository;
    use ApiResponseHelper;

    public function __construct()
    {
    $this->socialiterepository=new SocialiteRepository ();

    }

    public function redirectToProvider($provider)
    {
      $redirect_url=$this->socialiterepository->getRedirectUrlByProvider($provider);

      return redirect($redirect_url['redirectUrl']);
    }

    public function handleProviderCallback($provider)
    {
      $result = $this->socialiterepository->loginWithSocialite($provider);
      return redirect('/');
    }

}
