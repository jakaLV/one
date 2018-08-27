<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sods;


class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function admin(){
        return view('pages.admin');
    }
    //public function sodi(){
       
      //  return view('pages.sodi');
    //
    public function about(){
        return view('pages.about');
    }
}

