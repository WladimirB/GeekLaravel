<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    private $demoUsers = [
      [
        'login' => 'admin',
        'password' => 'admin',
        'role' => 'admin'
      ],
      [
        'login' => 'user1',
        'password' => 'user1',
        'role' => 'user'
      ]
    ];

    public function index(){
      return view('login');
    }

    public function auth(LoginRequest $request){
          //Проверка жесть конечно,но со временем думаю что переделается
           foreach ($this->demoUsers as $key => $value) {
            $userSearch = array_search($request->input('login'),$value);
            if($userSearch){
               $currentUser = $value;
               break;
             }
           }

           if(!$userSearch){
             return view('output', ['req'=>'пользователь не существует']);
           }

           if($request->input('password') === $currentUser['password']){
              $role = 'guestUser';
              if($currentUser['role'] === 'admin'){
                return view('admin.main');
              }elseif ($currentUser['role'] === 'user') {
                  $role ='user';
              }
              return view('output',['req'=>'user with role '.$role.' logged']);
              }else{
                return view('output',['req'=> 'wrong password for login '.$request->input('login')]);
              }
  }
}
