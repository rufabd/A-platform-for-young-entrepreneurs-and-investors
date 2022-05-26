<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index() {
        $commentss = Comment::all();
        return view('admin.comments.index', compact('commentss'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }
}
