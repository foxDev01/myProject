<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    protected $redirectTo = '/';

    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        return redirect()->intended($this->redirectTo);
    }
}
