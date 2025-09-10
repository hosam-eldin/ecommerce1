<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;


class LoginResponse implements LoginResponseContract
{
  public function toResponse($request)
  {
    return $request->wantsJson()
      ? response()->json(['two_factor' => false])
      : redirect()->intended('admin/dashboard');
  }
}