<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function update(Request $request){
        //validation rules

        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
            
        ]);
        $user =Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request->password){

           

            $this->validate($request,[
    
                'password' => 'min:8|confirmed',
    
            ]);
    
                  
    
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        return back()->with('message','Profile Updated');
    }


    public function delete($id){

        Auth::logout();
    
        if ($id->delete()) {
    
             return Redirect::route('dashboard')->with('global', 'Your account has been deleted!');
        }
      
    }
}
