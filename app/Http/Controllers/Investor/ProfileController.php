<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\InvestorProfile;
use App\Models\ProjectPostIndustryTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $profiles = InvestorProfile::all();
        return view('investor.profile.index', array('user' => Auth::user()), compact('profiles'));
    }

    public function create()
    {
        $pindustrytags = ProjectPostIndustryTag::all();
        $iprofiles = InvestorProfile::all();
        return view('investor.profile.create', compact('pindustrytags', 'iprofiles'));
    }

    public function store(Request $request) {
    
        $investorprofile = new InvestorProfile();
        
        $investorprofile->user_id=Auth::user()->id;

        $investorprofile->investor_name= $request->investor_name;

        $investorprofile->investor_surname= $request->investor_surname;

        $investorprofile->industry_tag_id= $request->industry_tag_id;

        $investorprofile->investor_description= $request->investor_description;

        $investorprofile->investor_insta_link=$request->investor_insta_link;
        
        $investorprofile->investor_face_link=$request->investor_face_link;

        $investorprofile->investor_linked_link=$request->investor_linked_link;

        if($request->hasFile('investor_avatar'))
        {
            $destination_path = 'public/avatars/investors';
            $investor_avatar = $request->file('investor_avatar');
            $investor_avatar_name = $investor_avatar->getClientOriginalName();
            $path = $request->file('investor_avatar')->storeAs($destination_path, $investor_avatar_name);
            $investorprofile->investor_avatar = $investor_avatar_name;
        }

        $investorprofile->save();

        // return redirect('/dashboard/profile')->with('message', 'Profile Created Successfully');
        return redirect('/dashboard/profile/investor')->with('message', 'Profile Created Successfully');
    }
}
