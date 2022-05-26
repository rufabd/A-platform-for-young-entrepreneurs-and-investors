<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\InvestorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        return view('investor.favorites.index', compact('user', 'favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ProjectPostHiringTag::create([
        //     'name' => $request->name,
        // ]);

        // return redirect()->route('admin-tags-projecthiring')->with('message', 'Tag Created Succesfully');

        // Favorite::create([
        //     'user_id' => $request->user_id,
        //     'project_id' => $request->project_id
        // ]);
        
        $this->validate($request, array(
            'user_id'=>'required',
            'project_id' =>'required',
        ));

        $status=Favorite::where('user_id',Auth::user()->id)
        ->where('project_id',$request->project_id)
        ->first();

        if(isset($status->user->id) and isset($request->project_id))
        {   
            return redirect()->back()->with('flash_messaged', 'This item is already in your
            wishlist!');
        }
        else
        {
            $favorite = new Favorite();

            $favorite->user_id = $request->user_id;
            $favorite->project_id = $request->project_id;
            $favorite->save();

            return redirect()->back()->with('flash_message',
                        'Item, '. $favorite->project->title.' Added to your wishlist.');
        }

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
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return redirect()->route('wishlist.index')
            ->with('flash_message',
            'Item successfully deleted');
    }
}
