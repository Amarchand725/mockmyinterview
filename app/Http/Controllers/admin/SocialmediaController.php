<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Socialmedia;

class SocialmediaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:social media-list|social media-list-create|social media-list-edit|social media-list-delete', ['only' => ['index','store']]);
        $this->middleware('permission:social media-list-create', ['only' => ['create','store']]);
        $this->middleware('permission:social media-list-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:social media-list-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $page_title = 'Social Media';
        $social = Socialmedia::first();
        return View('admin.social_media.index', compact("social", "page_title"));
    }

    public function update(Request $request)
    {
        $update = Socialmedia::first();
        $update->facebook = $request->input('facebook');
        $update->twitter = $request->input('twitter');
        $update->linkedin = $request->input('linkedin');
        $update->googleplus = $request->input('googleplus');
        $update->pinterest = $request->input('pinterest');
        $update->youtube = $request->input('youtube');
        $update->instagram = $request->input('instagram');
        $update->tumblr = $request->input('tumblr');
        $update->flickr = $request->input('flickr');
        $update->reddit = $request->input('reddit');
        $update->snapchat = $request->input('snapchat');
        $update->whatsapp = $request->input('whatsapp');
        $update->quora = $request->input('quora');
        $update->stumbleupon = $request->input('stumbleupon');
        $update->delicious = $request->input('delicious');
        $update->digg = $request->input('digg');
        $update->update();

        return redirect()->route('social_media.index')->with('message', 'Social Media Updated Successfully !');
    }
}
