<?php

namespace App\Http\Controllers;
use App\Models\Bill;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
       if(Auth::user()->hasRole('management')){
            return view('managedash');
       }elseif(Auth::user()->hasRole('tenant')){
            return view('tenantdash');
       }
        
   
   }

   public function tenantprofile()
   {
    return view('tenantprofile');
   }

   public function managerprofile()
   {
    return view('managerprofile');
   }

}