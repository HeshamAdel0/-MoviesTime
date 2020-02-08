<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Profile;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid =Auth::user()->id;
        $profiles = Profile::all()->Where('user_id', '=' , $userid );
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profile.edit', compact('profile'));
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
        $profile = Profile::find($id);
        // User Avater
        if ($request->avatar) {
            if ($profile->avatar != 'avatar_default.png') {
                //Check if have a default image dont remove the image
                //if not have a default image 
                    //1:remove old image
                    //2: add a new image
                Storage::disk('public_uploads')->delete('/images/user_images/avatar/' . $profile->avatar);
                
            }
            Image::make($request->avatar)
                ->resize(350, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/images/user_images/avatar/' . $request->avatar->hashName()));

            $profile->avatar = $request->avatar->hashName();

        }
        // User Profile Cover
        if ($request->profilecover) {
            if ($profile->profilecover != 'cover_default.png') {
                //Check if have a default image dont remove the image
                //if not have a default image 
                    //1:remove old image
                    //2: add a new image
                Storage::disk('public_uploads')->delete('/images/user_images/profile_imgs/' . $profile->profilecover);
                
            }
            Image::make($request->profilecover)
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/images/user_images/profile_imgs/' . $request->profilecover->hashName()));

            $profile->profilecover = $request->profilecover->hashName();

        }

        $profile->nickname    = $request->nickname;
        $profile->description = $request->description;
        $profile->about       = $request->about;
        $profile->phone       = $request->phone;
        $profile->adress      = $request->adress;
        $profile->website     = $request->website;
        $profile->facebook    = $request->facebook;
        $profile->twitter     = $request->twitter;
        $profile->instagram   = $request->instagram;
        $profile->youtube     = $request->youtube;
        $profile->pinterest   = $request->pinterest;
        $profile->github      = $request->github;
        $profile->linkedin    = $request->linkedin;
        $profile->save();
        Session::flash('success', 'You Successfully Update Profile!');
        return redirect()->to('/dashboard');
    }

}
