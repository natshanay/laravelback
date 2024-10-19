<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index(Request $request)
        {
            // Handle request
            return response()->json();
        }


    public function Loginform(){

        return view('partitions.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided email do not match our records.',
        ]);
    }
    // Register new user
    public function registerform(){
     return view('auth.register');
    }
   public function register(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|confirmed|min:8',
       ]);

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);

       Auth::login($user);

       return redirect()->intended('/');
   }
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
