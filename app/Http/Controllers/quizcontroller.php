<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\quiz;

class quizcontroller extends Controller
{
    public function index()
    {
        $categories = category::where('type', 'sowallar')->get();
        return view('adminsorag.quiz', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ady' => 'required',
            'sorag' => 'required',
            'jogap' => 'required',
            'maglumat' => 'required',
            'category' => 'required',
            'file' => 'required',
            'bal' => 'required|numeric',

        ]);

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path('files'), $file_name);

        $quiz = new quiz();
        $quiz->ady = request('ady');
        $quiz->sorag = request('sorag');
        $quiz->jogap = request('jogap');
        $quiz->maglumat = request('maglumat');
        $quiz->category = request('category');
        $quiz->file_path = $file_name;
        $quiz->bal = request('bal');
        $quiz->save();
        return redirect()->route('questions')->with('success', 'Sorag goşuldy');
    }

    public function quizconfig($id)
    {
        $category = quiz::where('category', $id)->get();
        $id = $id;
        return view('adminsorag.quizcrud', compact('category', 'id'));
    }

    public function edit_quiz($id)
    {
        $user = quiz::with('quiz')->find($id);
        return view('adminsorag.quiz_edit', compact('user'));
    }

    public function update_quiz(Request $request, $id)
    {
        $user = quiz::with('quiz')->find($id);
        $request->validate([
            'sorag' => 'required',
            'ady' => 'required',
            'jogap' => 'required',
            'maglumat' => 'required',
            'bal' => 'required|numeric',
        ]);

        $user->update($request->all());

        return redirect()->route('quizconfig', $user->quiz->id)
            ->with('success', 'Sorag uytgedildi');
    }

    public function destroy_quiz($id)
    {
        $user = quiz::find($id);
        $user->delete();
        return back();
    }

    public function destroy_cat_quiz($id)
    {
        $question = quiz::where('category', $id)->get();

        foreach ($question as $id1) {
            $id1->delete();
        }
        $d_category = category::where('id', $id)->get();
        foreach ($d_category as $d) {
            $d->delete();
        }
        return redirect()->route('questions');
    }
}
