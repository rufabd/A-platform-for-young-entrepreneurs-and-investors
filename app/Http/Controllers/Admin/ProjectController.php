<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectPost;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $projectposts = ProjectPost::all();
        if ($request->has('search')) {
            $projectposts = ProjectPost::where('title', 'like', "%{$request->search}%")->get();
        }
        return view('admin.projectPosts.index', compact('projectposts'));
    }

    public function destroy(ProjectPost $projectpostt)
    {
        $projectpostt->delete();
        return redirect()->route('admin-project-posts-index')->with('message', 'Post Deleted Succesfully');
    }
}
