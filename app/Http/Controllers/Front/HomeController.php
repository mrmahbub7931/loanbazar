<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\BestDeal;
use App\Models\BestService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $deals = BestDeal::all();
        $services = BestService::all();
        return view('frontend.pages.home',compact('sliders','deals','services'));
    }

    public function index()
    {
        return view('frontend.auth.users.dashboard');
    }
}