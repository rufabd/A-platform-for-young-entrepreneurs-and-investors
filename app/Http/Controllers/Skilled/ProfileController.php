<?php

namespace App\Http\Controllers\Skilled;

use App\Http\Controllers\Controller;
use App\Models\ProjectPostHiringTag;
use App\Models\ProjectPostIndustryTag;
use App\Models\SkilledProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        // return view('founder.profile.index');
        $profiles = SkilledProfile::all();
        return view('skilled.profile.index', array('user' => Auth::user()), compact('profiles'));
    }

    public function store(Request $request) {
    
        $skilledprofile = new SkilledProfile();
        $skilledprofile->user_id=Auth::user()->id;
        $file = $request->skilled_CV;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->skilled_CV->move('assets', $filename);

        

        $skilledprofile->skilled_name= $request->skilled_name;
        $skilledprofile->skilled_surname= $request->skilled_surname;
        $skilledprofile->skilled_profession=$request->skilled_profession;
        $skilledprofile->skilled_industry=$request->skilled_industry;
        $skilledprofile->skilled_telephone=$request->skilled_telephone;
        $skilledprofile->skilled_description=$request->skilled_description;
        $skilledprofile->skilled_experience_organization=$request->skilled_experience_organization;

        $skilledprofile->skilled_experience_position=$request->skilled_experience_position;
        $skilledprofile->skilled_experience_from=$request->skilled_experience_from;
        $skilledprofile->skilled_experience_till=$request->skilled_experience_till;
        $skilledprofile->skilled_experience_description=$request->skilled_experience_description;
        $skilledprofile->skilled_CV = $filename;

        if($request->hasFile('skilled_avatar'))
        {
            $destination_path = 'public/avatars/skilled';
            $skilled_avatar = $request->file('skilled_avatar');
            $skilled_avatar_name = $skilled_avatar->getClientOriginalName();
            $path = $request->file('skilled_avatar')->storeAs($destination_path, $skilled_avatar_name);
            $skilledprofile->skilled_avatar = $skilled_avatar_name;
        }

        // $skilledprofile->skilled_CV=$request->skilled_CV;

        
        $skilledprofile->save();

        return redirect('/dashboard/profile/skilled')->with('message', 'Profile Created Successfully');
    }
}
