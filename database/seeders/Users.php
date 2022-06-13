<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\command;
use App\Models\game_timer;
use App\Models\quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make(12344321),
            'score' => 0,
            'status' => 'admin',
            'answered' => '"0"',
            'wrong' => '"0"',
        ]);
        game_timer::create([
            'status'=>'retry',
            'added_time'=>date('Y-m-d H:i:s'),
        ]);
    //    category::create([
    //        'name'=>'Kriptografiýa',
    //        'file_path'=>'krypto.jpg',
    //        'type'=>'sowallar',
    //    ]);
    //     category::create([
    //         'name' => 'Forensic',
    //         'file_path' => 'pexels-sora-shimazaki-5935787.jpg',
    //         'type' => 'sowallar',
    //     ]);
     
    }
}
