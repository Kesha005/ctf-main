<?php

namespace App\Http\Controllers;

use App\Models\command;
use App\Models\User;
use Illuminate\Http\Request;

class command_controller extends Controller
{
    public function index()
    {
        $commands = command::with('commanding')->get();
        return view('adminuser.command', compact('commands'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function new_team()
    {
        return view('adminuser.new_team');
    }
    public function save_team(Request $request)
    {
        $request->validate(['name' => 'required']);
        $new_team = new command();
        $new_team->name = request('name');
        $new_team->save();
        return redirect()->route('teams');
    }
    public function del_team($id)
    {
        $users = User::where('command', $id)->get();

        foreach ($users as $id1) {
            $id1->delete();
        }
        $d_command = command::where('id', $id)->get();
        foreach ($d_command as $d) {
            $d->delete();
        }
        return redirect()->route('teams');
    }
    public function info_team($id)
    {
        $users = User::where('command', $id)->get();
        $id = $id;
        $team = command::where('id', $id)->get();

        $ids = $team[0];
        return view('adminuser.first', compact('users', 'id', 'ids'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
