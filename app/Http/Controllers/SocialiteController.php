<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialService;
use Socialite;

class SocialiteController extends Controller
{
  public function init()
  {
    return Socialite::driver('vkontakte')->redirect();
  }

  public function callback(SocialService $service)
  {
    $user = Socialite::driver('vkontakte')->user();
    $authUser = $service->updateUser($user);
    if($authUser) {
      return redirect()->route('profile');
    }

    throw new \Exception("User Not Found");

  }
}
