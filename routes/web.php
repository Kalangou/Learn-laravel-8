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
| Creation du module avec la migration automatique: php artisan make:model Post -m
| php artisan migrate:reset => Supprime les tables
| php artisan migrate:refresh => Supprime et cree les tables
| php artisan make:factory PostFactory --model=Post
| php artisan tinker : console comme celui de python 
| Post::factory()->count(10)->create();
| Carbon : Utile pour le formatages des données comme la date
|
| Suppression d'une table dans la base de données
| Creation d'une migration de suppression : php artisan make:migration remove_de_migration
| Ensuit de la fonction up() : Schema::dropIfExists('table_remove');
| git push origin master
|
| Creation de nos propres regles : php artisan make:rule NomRegle
|
|
*/

Route::get('/', [PostController::class, 'index'])->name('accueil');
// Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

Route::get('register', [PostController::class, 'register']);

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
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