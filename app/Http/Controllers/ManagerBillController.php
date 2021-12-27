<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerBillController extends Controller
{
    public function index()
    {
        
        
        $bills = Bill::all();

        return view('managerbill',compact('bills'));
    }

   

    public function edit($bill_id)
    {
        
        
        $bill = Bill::where('id', $bill_id)->first();

        return view('editbill',compact('bill'));
    }

    public function deleteBill($bill_id)
    {
        
        
        $bill = Bill::where('id', $bill_id)->first();

        $bill->delete();

        return redirect()->route('dashboard.managerbill');
    }

    public function update(Request $request){

        
      
        $bill = Bill::where('id', $request['id'])->first();

        $bill->date = $request['date'];
        $bill->due = $request['due'];
        $bill->total = $request['total'];
        $bill->status = $request['status'];

        $bill->save();
        return back()->with('message','Bill Updated');
    }



    public function add()

    {

        $users = User::whereRoleIs('tenant')->get();

        return view('addbill', compact('users'));
    }


    public function create(Request $request){

        
      


        $bill = Bill::create(['user_id' => $request->input('user_id'),'date' => $request->input('date'),'due' => $request->input('due'),'total' => $request->input('total'),'status' => $request->input('status') ]);
        return back()->with('message','Bill Created');
    }
}
