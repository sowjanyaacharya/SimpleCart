<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
class LoginController extends Controller
{
    public function showLoginForm(Request $request){
        return view('login');
    }

    //handling the login request
    public function login(Request $request){
        //validation of input
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        //Making user to log in
        $user=Users::where('email',$request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
        //check the user type
        Auth::login($user);
        //Redirect Based on user type
        if($user->type==='admin'){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('user.dashboard');
        }
        }
        return back()->withErrors(['error'=>'Invalid Credentials']);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->inavlidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    
}
