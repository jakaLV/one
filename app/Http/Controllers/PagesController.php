<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function stats(){
        return view('pages.stats');
    }
    public function sodi(){
        $title = 'Say hello to sodi';
        return view('pages.sodi')->with('title', $title);
    }
    public function about(){
        return view('pages.about');
    }
}

