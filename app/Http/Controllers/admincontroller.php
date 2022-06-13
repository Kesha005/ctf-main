<?php

namespace App\Http\Controllers;

use App\Models\command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class admincontroller extends Controller
{

    public function create($ids)
    {
        $team = command::where('id', $ids)->get(); 
      
        $ids=$team[0]->id;
        return view('adminuser.create',compact('team','ids'));
    }

    public function create_user(array $data)
    {
        if(Auth::check())
        {
            return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'command'=>$data['team']
        ]);
        }
        
    }
    public function store(Request $request)
    {
        if(Auth::check())
        {
             $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'team'=>'required',
        ]);
        $data=$request->all();
        $check=$this->create_user($data);
        return redirect()->route('teams')
                        ->with('success','Ulanyjy doredildi.');
        }
       
    }

  
    public function show(User $user)
    {
       
            return view('adminuser.admin-user',compact('user'));
   
        
    }

 
    public function edit(User $user)
    {
        if(Auth::check())
        {
             return view('adminuser.edit',compact('user'));
        }
       
    }

    
    public function update(Request $request, User $user)
    {
        if(Auth::check())
        {
             $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('teams')
                        ->with('success','Ulanyjy uytgedildi');
        }
       
    }

  
    public function destroy(User $user)
    {
        if(Auth::check())
        {
             $user->delete();
        return redirect()->route('teams')
                        ->with('success','Ulanyjy pozuldy');
        }
       
    }
    public function result()
    {

        $U = command::latest('scores')->take(15);
        $users = $U->pluck('name')->toArray();
        $scores = $U->pluck('scores')->toArray();
        return view('adminuser.result', compact('users', 'scores'));
    }
}
