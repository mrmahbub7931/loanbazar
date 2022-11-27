<?php

namespace App\Http\Controllers\front;

use App\Models\CardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardServiceController extends Controller
{
    public function cardView()
    {
        // $cardServices = CardService::all();
        // // foreach ($cardServices as $cardService) {
        // //     return $cardService->getServiceRows;
        // // }
        // return view('frontend.pages.card.visa', compact('cardServices'));
    }
    
    public function getMasterCard()
    {
        // return view('frontend.pages.card.master');
    }
    
    public function getAmexCard()
    {
        // return view('frontend.pages.card.amex');
    }
   
    public function getCobrandCard()
    {
        // return view('frontend.pages.card.cobrand');
    }
    
    public function getPersonalLoan()
    {
        return view('frontend.pages.loan.personal');
    }
    public function getHomeLoan()
    {
        return view('frontend.pages.loan.home');
    }
    public function getSmeLoan()
    {
        return view('frontend.pages.loan.sme');
    }
    public function getBikeLoan()
    {
        return view('frontend.pages.loan.bike');
    }
    public function getCarLoan()
    {
        return view('frontend.pages.loan.car');
    }
    public function getProjectLoan()
    {
        return view('frontend.pages.loan.project');
    }

}
