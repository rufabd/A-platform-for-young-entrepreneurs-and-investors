<?php

namespace App\Http\Controllers;

use App\Models\FounderProfile;
use App\Models\SkilledPost;
use App\Models\SkilledProfile;
use Illuminate\Http\Request;

class SkilledPostController extends Controller
{
    public function index(Request $request)
    {
        // Query builder
        //$posts = DB::table('project_posts')->paginate(2);

        // $posts = ProjectPost::paginate(2);
        $posts = SkilledPost::all();
        if ($request->has('search')) {
            $posts = SkilledPost::where('title', 'like', "%{$request->search}%")->get();
        }
        return view('SkilledPostsPublic.index', compact('posts'));
    }

    public function show(SkilledPost $post) {
        return view('SkilledPostsPublic.show', compact('post'));
    }

    public function listofPosts(SkilledProfile $skilledprofile) {
        // $founder_profile = FounderProfile::all();
        return view('skilled.profile.profileWithPosts', compact('$skilledprofile'));
    }
}
