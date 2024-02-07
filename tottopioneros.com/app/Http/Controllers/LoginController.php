<?php

namespace App\Http\Controllers;

use App\Voter;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin';
        }
        return '/home';
    }

    public function doLogin(Request $request)
    {
        $voter = Voter::where('identity_id', $request->get('identity_id'))->first();
        if($voter) {
            Auth::guard('voter')->login($voter);
            return redirect()->intended('projects');
        } else {
            return redirect('/login')->with('login_failed', 'La cédula es incorrecta o no existe.');
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('voter')->logout();

        return redirect()->intended('/');
    }
}
