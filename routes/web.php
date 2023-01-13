<?php

use App\Http\Controllers\ProfileController;
use Carbon\Traits\Rounding;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use Symfony\Component\Mime\Message;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuizController::class, 'quiz_list'])->name('quize.list');
Route::get('/quize/{id}', [QuizController::class, 'show'])->name('quize.show');
Route::match(array('GET', 'POST'), '/create/quize', [QuizController::class, 'quiz_create'])->name('quize.create');
Route::match(array('GET', 'POST'), '/edit/quize/{id}', [QuizController::class, 'quiz_edit'])->name('quize.edit');
Route::match (array('GET', 'POST'), '/take-quize/{quize_id}/{question_id?}', [QuizController::class, 'quize_take'])->name('quize.take_quize');
Route::get('delete/quize/{id}', [QuizController::class, 'delete_quize'])->name('quize.delete');

Route::get('/message/{message?}', [QuizController::class, 'show_message'])->name('message');

Route::post('/add/quiestion/{quize_id}', [QuestionController::class, 'create'])->name('question.add');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
