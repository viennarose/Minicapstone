<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home');
    }
    public function services(){
        $images = Service::where('status', '0')->get();
        return view('frontend.services', compact('images'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function about(){
        return view('frontend.about');
    }
    public function setappointment(){
        return view('frontend.appointmentfront');
    }

}
