<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke($language)
    {
        app()->setLocale($language);
        session()->put("locale",$language);
        return redirect()->back();
    }
}
