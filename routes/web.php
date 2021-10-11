<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Liste des routes : php artisan route:list
*/

Route::get('/', [PostController::class, 'index'])->name('accueil');
Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id');
Route::get('/contact', [PostController::class, 'contact'])->name('contact');

// Route::get('posts', function(){
//     return response()->json([
//         'titre' => 'Mon titre',
//         'description' => 'Ma description'
//     ]);
// });

// Route::get('articles', function(){
//     return view('articles');
// });