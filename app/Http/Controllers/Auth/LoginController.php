<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('login');
    }
    public function authentication(AuthRequest $request)
    {
  $email=$request->input('email');
  $password=$request->input('password');

  if(Auth::attempt(['email'=>$email,'password'=>$password])){
   $request->session()->regenerate();
   return redirect()->intended();
  }else{

    return redirect()->back()->with(['error'=>'خطأ بالإيميل أو كلمة المرور']);
  }


    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
