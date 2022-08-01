<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', function () {
    return redirect()->route('films');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\FilmsController::class, 'index']);

Route::prefix('/films')->group(function () {

    Route::get('/create', function () {
        return view('create_film');
    });

    Route::post('/create', [FilmsController::class, 'create'])->name('create-film');
    Route::get('/', [FilmsController::class, 'index'])->name('films');
    Route::get('/fetch_data', [FilmsController::class, 'index']);
    Route::get('/{film_slug?}', [FilmsController::class, 'show']);
    Route::post('/delete/{id}', [FilmsController::class, 'destroy'])->name('delete-film');
});

Route::get('/all-comments', [CommentsController::class, 'index'])->name('all-comments');
Route::get('/my-comments', [CommentsController::class, 'my_comments']);
Route::get('/add-comment', function () {
    $films = DB::table("films")->get();
    return view('add_comment', compact('films'));
})->name('add-comment');
Route::post('/add-comment', [CommentsController::class, 'create']);
