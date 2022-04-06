<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthForgotPasswordRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthPasswordResetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function login(AuthLoginRequest $request)
  {
    $credentials = $request->validated();
    $verifCredentials = Auth::attempt($credentials);

    if (!$verifCredentials) {
      return back()->withErrors(['authError' => 'Email e ou senha incorretos.'])->withInput();
    }

    session()->regenerate();
    return redirect()->intended();
  }

  public function forgotPassword(AuthForgotPasswordRequest $request)
  {
    $status = Password::sendResetLink($request->only('email'));
    return back()->withInput()->with('status', __($status));
  }

  public function showPasswordReset($token)
  {
    return view('password-reset', compact('token'));
  }

  public function passwordReset(AuthPasswordResetRequest $request)
  {
    $changeUserPassword = function ($user, $password) {
      $user->forceFill([
        'password' => Hash::make($password)
      ])->setRememberToken(Str::random(60));
      $user->save();
    };

    $status = Password::reset(
      $request->only('password', 'password_confirmation', 'token'),
      $changeUserPassword
    );

    return back()->with('status', __($status));
  }
}
