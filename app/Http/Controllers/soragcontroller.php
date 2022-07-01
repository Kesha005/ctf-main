<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\admincontroller;
use App\Models\crtsorag;
use App\Models\game_timer;
use Illuminate\Support\Facades\Storage;


class soragcontroller extends Controller
{
    public function on_page($compact1)
    {
        $categories1 = $compact1;
        $date = game_timer::latest()->first();

        $c_month = $date['added_time']->format('F');
        $c_date = $date['added_time']->format('d');
        $c_year = $date['added_time']->format('Y');
        $c_time = $date['added_time']->format('H:i:s');
        return view('adminsorag.admin-questions', compact( 'categories1', 'c_month', 'c_date', 'c_year', 'c_time', 'date'));
    }


    public function adminquestions()
    {
        $categories1 = category::with('categorytest')->where('type', 'sowallar')->get();
        $compact1 = $categories1;
        return $this->on_page( $compact1);
    }

    
    public function create_question()
    {

        $categories = category::where('type', 'test')->get();

        return view('adminsorag.admin-question-create', compact('categories'));

        return redirect("login")->withSucces('Siz hasaba alynmansyňyz');
    }

    

    public function create_category()
    {
        return view('adminsorag.admin-category');
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'file' => 'required',
            'typecategory' => 'required',
        ]);

        $photo = $request->file('file');
        $photo_name = $photo->getClientOriginalName();
        $photo->move(public_path('suratlar'), $photo_name);

        $category = new category();
        $category->category = request('category');
        $category->file_path = $photo_name;
        $category->type = request('typecategory');
        $category->save();

        return redirect()->route('questions');
    }


}
