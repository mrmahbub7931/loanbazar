<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


/**
 * get user name by this method
 * @param integer $userID
 */

if (!function_exists('getUsername')) {

    function getUsername($userID)
    {
        return DB::table('users')->where('id',$userID)->first()->name;
    }

    function getVendorName($vendorID)
    {
        return DB::table('users')->where('id',$vendorID)->first()->name;
    }

    function totalApplicationForVendor()
    {
        if (Auth::user()->role->slug == 'super-admin') {
            $applications = DB::table('loan_card_apply')->count();
        }else {
            $applications = DB::table('loan_card_apply')->where('send_to_vendor',Auth::user()->id)->count();
        }

        return $applications;
    }

    function totalLoanApplicationForVendor()
    {
        if (Auth::user()->role->slug == 'super-admin') {
            $applications = DB::table('loan_card_apply')->where('type','loan')->count();
        }else {
            $applications = DB::table('loan_card_apply')->where('send_to_vendor',Auth::user()->id)->where('type','loan')->count();
        }

        return $applications;
    }

    function totalCardApplicationForVendor()
    {
        if (Auth::user()->role->slug == 'super-admin') {
            $applications = DB::table('loan_card_apply')->where('type','card')->count();
        }else {
            $applications = DB::table('loan_card_apply')->where('send_to_vendor',Auth::user()->id)->where('type','card')->count();
        }

        return $applications;
    }

}
