<?php

namespace App\Http\Controllers;
use App\Models\Bill;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TenantBillController extends Controller
{
    
    public function index()
    {
        //
        // $posts = Post::all();
        $user = Auth::user();
        $bills = Bill::where('user_id',$user->id)->get();
        // dd($posts);
        return view('tenantbill',compact('bills'));
    }

    public function payment($bill_id)
    {
        $bill = Bill::where('id', $bill_id)->first();
        return view('payment',compact('bill'));
      
    }


    public function pay(Request $request){

        
      
        $bill = Bill::where('id', $request['id'])->first();

        $bill->status = $request['status'];
       

        $bill->save();
        return back()->with('message','Payment Successful');
    }

    
}
