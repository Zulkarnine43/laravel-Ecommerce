<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyRegistration;
use App\Models\User;
use App\Models\Product;


use Illuminate\Http\Request;

use Auth;


class LoginController extends Controller
{
 


  public function showLoginForm()
  {
    return view('auth.login');
  }



  public function login_save(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    //Find User by this email
    $user = User::where('email', $request->email)->first();
      // $password=Hash::make($request->password)
      //    $data=User::where($user->password,$password)->first();
    
           $products = Product::orderBy('id', 'desc')->paginate(9);
           return view('frontend.pages.index', compact('products'));
 
  }


}
