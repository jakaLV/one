<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
Use App\Language;


class LanguageController extends Controller
{
    public function __invoke(Request $request, $locale){
        return redirect('/')->withCookie(cookie()->forever('language', $locale));
    }

    public function lv(){
        
            return redirect('/')->withCookie(cookie()->forever('language', 'lv'));

    }
    public function en(){
            return redirect('/')->withCookie(cookie()->forever('language', 'en'));
    }
}