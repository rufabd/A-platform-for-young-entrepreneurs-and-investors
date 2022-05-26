<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportProblemController extends Controller
{
    public function index() {
        $problems = Problem::all();
        return view('admin.problems.index', compact('problems'));
    }

    public function store(Request $request)
    {
        Problem::create([
            'user_id' => $request->user_id = Auth::user()->id,
            'username' => $request->username = Auth::user()->name,
            'body' => $request->body
        ]);

        // return redirect()->route('')->with('message', 'Tag Created Succesfully');
    }
}
