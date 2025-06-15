<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        $data = [
            'title' => 'Sign Up',
            'bodyCssClass'=> 'sign-up-body',
        ];
        return view('auth.signup', $data);
    }

    // Show the Login form
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login',
            'bodyCssClass'=> 'login-body',
        ];
        return view('auth.login');
    }

    // RegisterController
    public function register(UserAuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    // LoginController
    public function login(UserAuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // logs out the user

        $request->session()->invalidate();      // invalidate session
        $request->session()->regenerateToken(); // prevent CSRF issues

        return redirect()->route('login.form')->with('status', 'You have been logged out successfully.');
    }

}
