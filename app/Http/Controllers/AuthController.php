<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;

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
}
