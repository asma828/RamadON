<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use App\Models\Recipe;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('user')
            ->latest()
            ->take(2)
            ->get();

  $popularRecipes = Recipe::with(['user', 'category'])
  ->take(3)
  ->get();

 $totalPosts = Experience::count();
 $totalRecipes = Recipe::count();

 return view('home', compact('experiences', 'popularRecipes', 'totalPosts', 'totalRecipes'));
}
}