<?php

namespace App\Http\Controllers;

use App\Models\ProjectPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectPostController extends Controller
{
    public function index(Request $request)
    {
        // Query builder
        //$posts = DB::table('project_posts')->paginate(2);

        $posts = ProjectPost::paginate(3);
        // $posts = ProjectPost::all();
        if ($request->has('search')) {
            $posts = ProjectPost::orderBy('created_at','desc')->where('title', 'like', "%{$request->search}%")->paginate(3);
        }
        return view('FounderPostsPublic.index', compact('posts'));
    }

    public function show(ProjectPost $post) {
        return view('FounderPostsPublic.show', compact('post'));
    }
}
