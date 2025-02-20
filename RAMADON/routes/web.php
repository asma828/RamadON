<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/salam/{nom}/{prenom}',function(Request $Request){
//  return view('salam',[
//     'nom'=>$Request->nom,
//     'prenom'=>$Request->prenom
//  ]);

// });

// Experiences
Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');

// Recipes
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

// Comments
Route::get('/experiences/{experience}/comments', [CommentController::class, 'getExperienceComments']);
Route::post('/experiences/{experience}/comments', [CommentController::class, 'storeExperienceComment'])
    ->name('experiences.comments.store');

    Route::get('/experiences/{experience}/comments', [CommentController::class, 'getExperienceComments']);
