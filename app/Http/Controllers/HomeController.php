<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function main(){
        return response()->view('main-website.pages.main');
    }

    public function about(){
        return response()->view('main-website.pages.about');
    }

    public function nutrition(){
        return response()->view('main-website.pages.nutrition');
    }

    public function awareness(){
        return response()->view('main-website.pages.awareness');
    }

    public function contact(){
        return response()->view('main-website.pages.contact-us');
    }

    public function symptoms(){
        return response()->view('main-website.pages.symptoms');
    }
}
