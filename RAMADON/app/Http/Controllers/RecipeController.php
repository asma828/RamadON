<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::with(['user', 'category']);
        
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
        
        $recipes = $query->latest()->paginate(15);
        $categories = Category::all();
        
        return view('recipes.index', compact('recipes', 'categories'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $recipe = new Recipe();
        $recipe->user_id = Auth::id() ?? 1; // Fallback to ID 1 if no auth
        $recipe->title = $validated['title'];
        $recipe->category_id = $validated['category_id'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->instructions = $validated['instructions'];
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
            $recipe->image_path = $imagePath;
        }
        
        $recipe->save();
        
        return redirect()->back()->with('success', 'Votre recette a été partagée avec succès !');
    }

}
