<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);

        $userCreate = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        if ($userCreate) {
            return redirect()->back()->with('success', 'Record saved successfully.');
        }
    }

    public function users()
    {

        return User::all();
    }

    public function dublicate()
    {
        $users = User::all();
        if(count($users)>0){
            foreach($users as $user){
                $lastdight = $user->mobile[strlen($user->mobile)-1];
                $incrementedValue = $lastdight==9 ? 0 : (int) $lastdight+1;
                $mobileWithoutLastDigit = substr($user->mobile, 0, -1); 
                $newMobile = $mobileWithoutLastDigit . $incrementedValue; 
    
                $userCreate = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'mobile' => $newMobile,
                ]);
            }
            return $userCreate;
        }else{
            return [];
        }
    }
}
