<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginn(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); 
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }



    public function login(){
        $user = User::where('email', $request->email)->first();

    }
}