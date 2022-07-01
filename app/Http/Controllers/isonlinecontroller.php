<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class isonlinecontroller extends Controller
{
    public function isonline()
    {
        if (Auth::check()) {
            $users = User::all();
            foreach ($users as  $user) {
                if (Cache::has('user-is-online-' . $user->id)) {
                    $user->condition = 'Online';
                } else {
                    $user->condition = 'Offline';
                }
            }
            return view('admin-monitoring', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }
}
