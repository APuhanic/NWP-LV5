<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        if (in_array($locale, config('app.supported_locales'))) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}