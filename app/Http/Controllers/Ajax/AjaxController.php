<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AjaxController extends Controller
{
    public function index(){
        $U = User::latest('score')->take(15);

        $users = $U->pluck('name');
        $scores = $U->pluck('score'); 
        return response([$users, $scores],200);
    }
}
