<?php

namespace App\Http\Controllers\Skilled;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkilledPostRequest;
use App\Models\ProjectPostHiringTag;
use App\Models\ProjectPostIndustryTag;
use App\Models\SkilledPost;
use App\Models\SkilledProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkilledPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skilledposts = SkilledPost::all();
        if ($request->has('search')) {
            $skilledposts = SkilledPost::where('title', 'like', "%{$request->search}%")->get();
        }
        return view('skilled.skilledPosts.index', compact('skilledposts'));
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
        $sprofiles = SkilledProfile::all();
        return view('skilled.skilledPosts.create', compact('phiringtags', 'pindustrytags', 'sprofiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkilledPostRequest $request)
    {
        SkilledPost::create($request->validated());
        return redirect()->route('skilled-posts-index')->with('message', 'Post Created Successfully');
    }

    public function download(Request $request, $file) {
        return response()->download(public_path('assets/'.$file));
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
