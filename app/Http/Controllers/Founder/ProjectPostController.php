<?php

namespace App\Http\Controllers\Founder;

use App\Http\Controllers\Controller;
use App\Http\Requests\FounderPostRequest;
use App\Models\FounderProfile;
use App\Models\ProjectPost;
use App\Models\ProjectPostHiringTag;
use App\Models\ProjectPostIndustryTag;
use Illuminate\Http\Request;

class ProjectPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectposts = ProjectPost::all();
        if ($request->has('search')) {
            $projectposts = ProjectPost::where('title', 'like', "%{$request->search}%")->get();
        }
        return view('founder.projectPost.index', compact('projectposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phiringtags = ProjectPostHiringTag::all();
        $pindustrytags = ProjectPostIndustryTag::all();
        $fprofiles = FounderProfile::all();
        return view('founder.projectPost.create', compact('phiringtags', 'pindustrytags', 'fprofiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FounderPostRequest $request)
    {
        ProjectPost::create($request->validated());
        return redirect()->route('founder-project-posts-index')->with('message', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
