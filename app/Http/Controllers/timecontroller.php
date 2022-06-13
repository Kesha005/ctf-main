<?php

namespace App\Http\Controllers;

use App\Models\command;
use App\Models\game_timer;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class timecontroller extends Controller
{
    public function post_time(Request $request)
    {
        $request->validate(['time'=>'required|numeric']);

        $game_time=game_timer::latest()->first();

        if(isEmpty($game_time)==false)
        {
            $game_time1=new game_timer();
            $game_time1->added_time = date("Y-m-d H:i:s", strtotime("+ " . request('time') . "minutes"));
            $game_time1->status='on_progress';
            $game_time1->save();
            return redirect()->route('questions');
        }      
        else
        {
            $game_time->added_time = date("Y-m-d H:i:s", strtotime("+ " . request('time') . "minutes"));
            $game_time->status = 'on_progress';
            $game_time->save();
            return redirect()->route('questions');
        }
    }

    public function end_game()
    {
        $game_time = game_timer::latest()->first();
        $game_time->status='end';
        $game_time->save();
        return redirect()->route('questions');
    }

    public function ret()
    {
        $teams = command::all();
        foreach ($teams as $user) {
            $user->scores = 0;
            $user->answered='"0"';
            $user->save();
        }
        return redirect()->route('questions');
    }

    public function new_game()
    {
        $users=User::all();
       
        $time=game_timer::latest()->first();
        foreach($users as $user)
        {
            $user->score=0;
            $user->answered="'0'";
            $user->wrong="'0'";
            $user->save();
        }
        $time->status='retry';
        $time->added_time=date('Y-m-d H:i:s');
        $time->save();
        return $this->ret();
    }

 
    public function game_over_admin()
    {
        $time = game_timer::latest()->first();
        $time->status = 'end';
        $time->save();
        if (Auth::user()->status=='admin')
        {
            return redirect()->route('questions');
        }
        else
        {
            return redirect()->route('users');
        }
        
        
    }
}
