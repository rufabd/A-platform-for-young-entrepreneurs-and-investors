<?php

namespace App\Http\Controllers;

use App\Models\ProjectPostIndustryTag;
use Illuminate\Http\Request;

class ProjectIndustryTagController extends Controller
{
    public function index(Request $request) {
        $pindustrytags = ProjectPostIndustryTag::all();
        if ($request->has('search')) {
            $pindustrytags = ProjectPostIndustryTag::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('admin.tags.industry.index', compact('pindustrytags'));
    }

    public function store(Request $request)
    {
        ProjectPostIndustryTag::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin-tags-projectindustry')->with('message', 'Tag Created Succesfully');
    }
}
