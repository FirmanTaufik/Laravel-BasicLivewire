<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Blogs;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});
Route::get('/firebase',[App\Http\Controllers\FirebaseController::class, 'index']);

Route::get('/data',[App\Http\Controllers\FirebaseData::class, 'index'] );
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('blog', Blogs::class);



