<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Experience;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getExperienceComments(Experience $experience)
    {
        $experience->load('user');
        $comments = $experience->comments()->with('user')->latest()->get();
        
        return response()->json([
            'experience' => $experience,
            'comments' => $comments
        ]);
    }

    public function storeExperienceComment(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'content' => 'required|max:1000',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id() ?? 1;
        $comment->experience_id = $experience->id;
        $comment->content = $validated['content'];
        $comment->save();

        $comment->load('user');
        return response()->json($comment);
    }
}
