<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\admincontroller;
use App\Models\category;
class authcontroller extends Controller
{
#__________________________________________Ulanyjy paneli we login register funksiyalary____________________________________________________

    public function users()
    {
        if(Auth::check())
        {
            $categories = category::with('categorytest')->get();
            return view('userpanel.index',compact('categories' ));
            
        }
        return redirect("login")->withSucces('Siz hasaba alynmansyňyz');
    }
    
    public function signOut()
    {
        Auth::logout();  
        return Redirect('login');
    }

 
}


