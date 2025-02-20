<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('user')->latest()->paginate(10);
        return view('experiences.index', compact('experiences'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $experience = new Experience();
        $experience->user_id = Auth::id() ?? 1; 
        $experience->title = $validated['title'];
        $experience->content = $validated['content'];
        
        if ($request->hasFile(key: 'image')) {
            $imagePath = $request->file('image')->store('experiences', 'public');
            $experience->image_path = $imagePath;
        }
        
        $experience->save();
        
        return redirect()->back()->with('success', 'Votre expérience a été partagée avec succès !');
    }
} 

