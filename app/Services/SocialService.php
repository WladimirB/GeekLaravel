<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class SocialService
{
  public function updateUser($user): bool
  {
    $email = $user->getEmail();
    $authUser = User::where('email', $email)->first();
    
    //если получили запись о пользвателе из таблицы,авторизуем и выходим
    if($authUser) {
      \Auth::login($authUser);
      return true;
    }
    //если пользователь не существует,доваляем и авторизуем его
    if(!$authUser) {
      $authUser = new User();
      $authUser->name = $user->getName();
      $authUser->password = bcrypt($user->token);
      $authUser->email = $email;
      $authUser->avatar = $user->getAvatar();
      $authUser->save();
      \Auth::login($authUser);
      return true;
    }

    return false;
  }
}
