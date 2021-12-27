<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class TenantManagerController extends Controller
{
    public function index()
    {
        
        
        $users = User::whereRoleIs('tenant')->get();

        return view('tenantmanager', compact('users'));

        
    }

    public function edittenant($user_id)
    {
        
        
        $user = User::where('id', $user_id)->first();

        return view('edittenant',compact('user'));
    }

    public function update(Request $request){

        
      
        $user = User::where('id', $request['id'])->first();

        $user->name = $request['name'];
        $user->email = $request['email'];
     

        $user->save();
        return back()->with('message','Tenant Updated');
    }

    public function deleteTenant($user_id)
    {
        
        
        $user = User::where('id', $user_id)->first();

        $user->delete();

        return redirect()->route('dashboard.tenantmanager');
    }
}
