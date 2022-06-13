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
    public function on_page($compact, $compact1)
    {
        $categories = $compact;
        $categories1 = $compact1;
        $date = game_timer::latest()->first();

        $c_month = $date['added_time']->format('F');
        $c_date = $date['added_time']->format('d');
        $c_year = $date['added_time']->format('Y');
        $c_time = $date['added_time']->format('H:i:s');
        return view('adminsorag.admin-questions', compact('categories', 'categories1', 'c_month', 'c_date', 'c_year', 'c_time', 'date'));
    }


    public function adminquestions()
    {

        $categories = category::with('categorytest')->where('type', 'test')->get();
        $categories1 = category::with('categorytest')->where('type', 'sowallar')->get();
        $compact = $categories;
        $compact1 = $categories1;
        return $this->on_page($compact, $compact1);
    }

    
    public function create_question()
    {

        $categories = category::where('type', 'test')->get();

        return view('adminsorag.admin-question-create', compact('categories'));

        return redirect("login")->withSucces('Siz hasaba alynmansyňyz');
    }

    
    public function store_question(Request $request)
    {

        $request->validate([
            'sorag' => 'required',
            'ady' => 'required',
            'jogap' => 'required',
            'barlag1' => 'required',
            'barlag2' => 'required',
            'bal' => 'required|numeric',
            'category' => 'required',

        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('questions')->with('success', 'Test goşuldy');
    }
    public function create(array $data)
    {
        return crtsorag::create([
            'sorag' => $data['sorag'],
            'ady' => $data['ady'],
            'jogap' => $data['jogap'],
            'barlag1' => $data['barlag1'],
            'barlag2' => $data['barlag2'],
            'bal' => $data['bal'],
            'category' => $data['category'],
        ]);
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


    #___________________________________Crud system for Questions  {Adminstrator}__________________________________________

    public function sorag_configuration($id)
    {
        $category = crtsorag::where('category', $id)->get();
        $id = $id;
        return view('adminsorag.admin-question_crud', compact('category', 'id'));
    }


    public function show()
    {
        $user = crtsorag::find(request('user'));
        return view('adminsorag.question_info', compact('user'));
    }

    public function destroy($id)
    {
        $user = crtsorag::find($id);
        $user->delete();
        return back();
    }


    public function edit_question($id)
    {
        $user = crtsorag::with('crtsorag')->find($id);
        return view('adminsorag.question_edit', compact('user'));
    }


    public function update(Request $request,  $id)
    {
        $user = crtsorag::with('crtsorag')->find($id);
        $request->validate([
            'sorag' => 'required',
            'ady' => 'required',
            'jogap' => 'required',
            'barlag1' => 'required',
            'barlag2' => 'required',
            'bal' => 'required|numeric',
        ]);

        $user->update($request->all());

        return redirect()->route('sorag_configuration', $user->crtsorag->id)
            ->with('success', 'Test uytgedildi');
    }

    public function destroy_category($id)
    {

        $question = crtsorag::where('category', $id)->get();

        foreach ($question as $id1) {
            $id1->delete();
        }
        $d_category = category::where('id', $id)->get();
        foreach ($d_category as $d) {
            $d->delete();
        }
        return redirect()->route('questions');
    }


    #___________________________________________________________________________________________________________________________
}
