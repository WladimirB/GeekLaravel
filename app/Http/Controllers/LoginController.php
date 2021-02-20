<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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

    public function auth(Request $request){
      $validator = Validator::make($request->all(), [
              'login' => 'required',
              'password' => 'required',
          ]);

          if ($validator->fails()) {
              return redirect('login')
                          ->withErrors($validator)
                          ->withInput();
          }else{
          //Проверка жесть конечно,но со временем думаю что переделается
           foreach ($this->demoUsers as $key => $value) {
            $userSearch = array_search($request->input('login'),$value);
            if($userSearch){
               $currentUser = $value;
               break;
             }
           }

           if(!$userSearch){
             echo "error";
             return;
           }

           if($request->input('password') === $currentUser['password']){
              $role = 'guestUser';
              if($currentUser['role'] === 'admin'){
                return view('admin');
              }elseif ($currentUser['role'] === 'user') {
                  $role ='user';
              }
              return view('output',['req'=>'user with role '.$role.' logged']);
              }else{
                return view('output',['req'=> 'wrong password for login '.$request->input('login')]);
              }
    }
  }
}
