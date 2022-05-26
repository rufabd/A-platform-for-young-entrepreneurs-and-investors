<?php

namespace App\Http\Controllers\Founder;

use App\Http\Controllers\Controller;
use App\Http\Requests\FounderProfileRequest;
use App\Models\FounderProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Storage; 

class ProfileController extends Controller
{

    public function index() {
        // return view('founder.profile.index');
        $profiles = FounderProfile::all();
        return view('founder.profile.index', array('user' => Auth::user()), compact('profiles'));
    }

    public function store(Request $request) {
    
        $founderprofile = new FounderProfile();
        
        $founderprofile->user_id=Auth::user()->id;

        $founderprofile->founder_name= $request->founder_name;

        $founderprofile->founder_surname= $request->founder_surname;

        $founderprofile->founder_position= $request->founder_position;

        $founderprofile->founder_organization= $request->founder_organization;

        $founderprofile->founder_telephone=$request->founder_telephone;

        $founderprofile->founder_insta_link=$request->founder_insta_link;
        
        $founderprofile->founder_face_link=$request->founder_face_link;

        $founderprofile->founder_linked_link=$request->founder_linked_link;

        $founderprofile->founder_description=$request->founder_description;

        

        if($request->hasFile('founder_avatar'))
        {
            $destination_path = 'public/avatars/founders';
            $founder_avatar = $request->file('founder_avatar');
            $founder_avatar_name = $founder_avatar->getClientOriginalName();
            $path = $request->file('founder_avatar')->storeAs($destination_path, $founder_avatar_name);
            $founderprofile->founder_avatar = $founder_avatar_name;
        }

        $founderprofile->save();

        // return redirect('/dashboard/profile')->with('message', 'Profile Created Successfully');
        return redirect('/dashboard/profile/founder')->with('message', 'Profile Created Successfully');
    }

    public function edit(FounderProfile $founderprofile)
    {
        return view('founder.profile.edit', compact('founderprofile'));
    }

    public function update(FounderProfileRequest $request, FounderProfile $founderprofile)
    {
        $founderprofile->update($request->validated());

        return redirect()->route('dashboard-profile')->with('message', 'Country Updated Successfully');
    }
}
