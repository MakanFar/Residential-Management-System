<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\contract;

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

    public function payment(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'IBAN'=>'required',
        ]);
        $bill = Bill::findOrFail($id);

         $status = "Paid";
    
         $bill->status = $status;
       
         $post->save();
        return redirect()->route('tenantbill')->with('success','payment successful');
    }

    
}
