<?php 

use Illuminate\Support\Facades\DB;


/**
 * get user name by this method 
 * @param integer $userID
 */

if (!function_exists('getUsername')) {

    function getUsername($userID)
    {
        return DB::table('users')->where('id',$userID)->first()->name;
    }
        
}