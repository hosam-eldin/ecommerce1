<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    //
    public function hindi()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'hindi');
        return redirect()->back();
    }

    public function english()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}
