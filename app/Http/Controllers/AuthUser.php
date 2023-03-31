<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthUser
{
    /**
     *  @var User
     */

     private User $user;

     public function __Construct(User $user){
         $this -> user = $user;
     }

     public function user()
     {
         if(Session::has('user_id_auth')) {
             $user_info = $this -> user -> where('id', '=', Session::get('user_id_auth')) -> first();
         }

         return $user_info;
     }
}
