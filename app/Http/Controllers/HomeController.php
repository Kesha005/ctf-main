<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\category;
use App\Models\command;
use App\Models\quiz;
use App\Models\game_timer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\View as ViewView;
use League\Flysystem\Config;
use Spatie\FlareClient\View as FlareClientView;

class HomeController extends Controller
{
    public $date;
    public $c_month;
    public $c_date;
    public $c_time;
    public $c_year;




    public function __construct()
    {
        $this->middleware('auth');
        $this->date = game_timer::latest()->first();
        $this->c_month = $this->date['added_time']->format('F');
        $this->c_date  = $this->date['added_time']->format('d');
        $this->c_year  = $this->date['added_time']->format('Y');
        $this->c_time  = $this->date['added_time']->format('H:i:s');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $categories1 = category::with('categorytest')->where('type', 'sowallar')->get();
        $usid = Auth::user()->id; //ulanyly belgisi
        $user = User::find($usid); //ulanyjy doly maglumatlar bilen
        $date = game_timer::latest()->first();
        
        return view('userpanel.questioncomp', compact( 'categories1', 'user', 'usid', 'date'));
    }

    #_____________________________________Quiz_Controllers__________________________________________________________________
    public function download($id)
    {
        $sowal = quiz::find($id);
        $path = public_path('files/' . $sowal->file_path);
        return response()->download($path);
    }


    public function quizes($id)
    {
        $question_ids = Auth::user()->answered;
        $team_user = command::where('id', Auth::user()->command)->get(); #####users team
        $array_team_answer = str_split($team_user[0]->answered); #matrix team answer
        $array_answer = str_split($question_ids);
        $category = quiz::where('category', $id)->get();
        $id = $id;
        $date = game_timer::latest()->first();
        $istrue=true;
        $categories1 = category::with('categorytest')->where('type', 'sowallar')->get();
        $usid = Auth::user()->id; //ulanyly belgisi
        $user = User::find($usid); //ulanyjy doly maglumatlar bilen
        $date = game_timer::latest()->first();
        return view('userpanel.quiz', compact('user','categories1', 'category', 'id', 'question_ids', 'array_answer', 'array_team_answer', 'date','istrue'));
    }
    public function show_quiz($id)
    {
        $question = quiz::find($id);
        $usid = Auth::user()->id; //ulanyly belgisi
        $user = User::find($usid); //ulanyjy doly maglumatlar bilen
        $date = game_timer::latest()->first();

        return view('userpanel.quiz_show', compact('user','question'));
    }


    public function quiz_control(Request  $id)
    {
        $data_id = json_decode(request('data'))->id;

        $question = quiz::find($data_id);
        $jogap = $question->jogap; //sorgyn jogaby            
        $bal = $question->bal; //sorgyn baly
        $qid = strval($question->id); //soragyn idis
        $user = User::find(Auth::user()->id); //ulanyjy doly maglumatlar bilen
        $usscore = $user->score; //ulanyjynyn onki baly
        $team = command::find($user->command); #####users team
        $ans_team = json_decode($team->answered); ###team answers
        $team_score = $team->scores;
        $len_array = strlen($ans_team);


        if ($id->jogap == $jogap) {
            for ($i = 0; $i < $len_array; ++$i) {
                if ($qid == $ans_team[$i]) {
                    return redirect()->route('quizes', $question->category)->with('success', 'Jogap dogry dowam ediň');
                    $control1 = true;
                }
            }
            if ($control1 = true) {
                $newscore = $usscore + $bal;
                $user->score = $newscore;
                $user->save();
                $control = true;
            }
            if ($control = true) {
                $userStore = json_encode($ans_team .= $qid);
                $team->answered = $userStore;
                $team->scores = $team_score + $bal;
                $team->save();
                return redirect()->route('quizes', $question->category)->with('success', 'Jogap dogry dowam ediň');
            }
        }
        return redirect()->route('quiz.show', $question->id)->with('error', 'Jogap nädogry');
    }

    #_____________________________________Quiz_controller_End_________________________________________________________________________________

    #______________________________________________User_profile_functions_____________________________________________________________
    public function raiting()
    {
        $U = command::latest('scores')->take(15);
        $users = $U->pluck('name')->toArray();
        $scores = $U->pluck('scores')->toArray();
        return view('userpanel.userresult', compact('users', 'scores'));
    }
}
