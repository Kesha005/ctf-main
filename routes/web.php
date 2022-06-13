<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\command_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\isonlinecontroller;
use App\Http\Controllers\soragcontroller;
use App\Http\Controllers\userpanelcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\quizcontroller;
use App\Http\Controllers\start_gamecontroller;
use App\Http\Controllers\startgamecontroller;
use App\Http\Controllers\timecontroller;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware'=>['auth']],function(){

Route::get('signout',[authcontroller::class,'signOut'])->name('signout');






#___________________________ User panel_________________________________________________________
Route::get('users',[HomeController::class,'index'])->name('users');

Route::group(['middleware'=>['time']],function(){

   Route::get('/questions/{ques}', [HomeController::class, 'sorag_user'])->name('sorag_user');

   Route::get('/question/{question}', [HomeController::class, 'show'])->name('question');

   Route::post('/control-answer/{question}', [HomeController::class, 'question_control'])->name('question-control');

   Route::get('/quizes/{quiz}', [HomeController::class, 'quizes'])->name('quizes');

   Route::get('quiz/{id}', [HomeController::class, 'show_quiz'])->name('quiz.show');

   Route::post('/quiz_control', [HomeController::class, 'quiz_control'])->name('quiz-control');

   Route::get('/profile', [HomeController::class, 'user_profile'])->name('user.profile');

   Route::get('/download/{file}', [HomeController::class, 'download'])->name('download');
});



Route::get('/raiting', [HomeController::class, 'raiting'])->name('raiting');

Route::get('AjaxTest', [AjaxController::class, 'index'])->name('ajax');

Route::get('/admin/end_game', [timecontroller::class, 'end_game'])->name('end_game');

Route::get('admin/new_game', [timecontroller::class, 'new_game'])->name('new_game');

Route::get('/game_over_a', [timecontroller::class, 'game_over_admin'])->name('game_over_admin');

#___________________________________User panel END____________________________________________________________________



#____________________________________Admin_Panel_____________________________________

Route::group(['middleware'=>['admin']],function()

{
   Route::get('questions',[soragcontroller::class, 'adminquestions'])->name('questions');

   Route::get('create_question',[soragcontroller::class, 'create_question'])->name('create_question');

   Route::get('/admin/results',[admincontroller::class,'result'])->name('result_admin');

   Route::get('/admin/create_user{id}',[admincontroller::class,'create'])->name('admin.create');

   Route::get('/admin/show_user/{user}',[admincontroller::class,'show'])->name('admin.show');

   Route::get('/admin/edit_user/{user}',[admincontroller::class,'edit'])->name('admin.edit');

   Route::post('/admin/store_user', [admincontroller::class, 'store'])->name('admin.store');

   Route::put('/admin/update_user/{user}',[admincontroller::class,'update'])->name('admin.update');

   Route::delete('/admin/delete/{user}',[admincontroller::class,'destroy'])->name('admin.destroy');


   Route::get('/admin/teams',[command_controller::class,'index'])->name('teams');

   Route::get('/admin/new_team',[command_controller::class,'new_team'])->name('new_team');

   Route::post('/admin/store_team',[command_controller::class,'save_team'])->name('save_team');

   Route::get('/admin/info_team/{info}', [command_controller::class, 'info_team'])->name('info_team');

   Route::delete('/admin/del_team/{del}', [command_controller::class, 'del_team'])->name('del_team');



#_____________________________Category and question routes___________________________
Route::get('/admin/create_category',[soragcontroller::class,'create_category'])->name('create_category');

Route::post('/admin/store_category',[soragcontroller::class,'store_category'])->name('store_category');

Route::post('/admin/store_question',[soragcontroller::class,'store_question'])->name('store');

Route::get('/admin/questions/{id}',[soragcontroller::class,'sorag_configuration'])->name('sorag_configuration');

Route::get('/admin/monitoring',[isonlinecontroller::class,'isonline'])->name('monitoring');

Route::get('/admin/create_quiz',[quizcontroller::class,'index'])->name('create_quiz');

Route::post('/admin/store_quiz',[quizcontroller::class,'store'])->name('store_quiz');

Route::get('/admin/quizes/{id}',[quizcontroller::class,'quizconfig'])->name('quizconfig');

Route::get('/admin/edit_quiz/{id}',[quizcontroller::class,'edit_quiz'])->name('edit_quiz');

Route::put('/admin/update_quiz/{id}',[quizcontroller::class,'update_quiz'])->name('update.quiz');

Route::delete('/admin/quiz_destroy/{id}',[quizcontroller::class,'destroy_quiz'])->name('quiz_delete');

Route::delete('/admin/quiz_categ_delete/{id}',[quizcontroller::class,'destroy_cat_quiz'])->name('destroy_quizcat');


#___________________________________________________game_time__________________________________________________________________________________________________

Route::post('/admin/time_post', [timecontroller::class, 'post_time'])->name('time_post')->middleware('admin');




#_______________________________Question Crud routes_____________________________________

Route::get('admin/question_show/{user}',[soragcontroller::class,'show'])->name('question_show');

Route::delete('admin/question_delete/{id}', [soragcontroller::class, 'destroy'])->name('question_delete');

Route::get('/admin/edit_question/{id}', [soragcontroller::class, 'edit_question'])->name('question_edit');

Route::put('/admin/update_question/{id}', [soragcontroller::class, 'update'])->name('update.question');

Route::delete('/admin/categories/destroy_category/{id}',[soragcontroller::class,'destroy_category'])->name('destroy.category');

});
});

