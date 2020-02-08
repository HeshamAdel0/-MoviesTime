<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_setting'])->only('index');
        $this->middleware(['permission:update_setting'])->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setting.edit');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::find($id);
        return view('setting.edit', compact('settings'));
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
        $setting = Setting::find($id);
        if ($request->website_logo) {
            if ($setting->website_logo != 'websile-logo.png') {
                //Check if have a default image dont remove the image
                //if not have a default image 
                    //1:remove old image
                    //2: add a new image
                Storage::disk('public_uploads')->delete('uploads/images/logo/' . $setting->website_logo);
                
            }
            Image::make($request->website_logo)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/images/logo/' . $request->website_logo->hashName()));

            $setting->website_logo = $request->website_logo->hashName();

        }
        $setting->website_name        = $request->website_name;
        $setting->website_email       = $request->website_email;
        $setting->website_adress      = $request->website_adress;
        $setting->website_description = $request->website_description;
        $setting->website_facebook    = $request->website_facebook;
        $setting->website_twitter     = $request->website_twitter;
        $setting->website_instagram   = $request->website_instagram;
        $setting->website_youtube     = $request->website_youtube;
        $setting->website_pinterest   = $request->website_pinterest;
        $setting->website_github      = $request->website_github;
        $setting->website_linkedin    = $request->website_linkedin;
        
        $setting->save();
        Session::flash('success', 'You Successfully Update setting!');
        return redirect()->back();
    }

}
