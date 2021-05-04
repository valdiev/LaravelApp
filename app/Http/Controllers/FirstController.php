<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FirstController extends Controller
{
  public function index()
  {
    $photos = Photo::all(); // SELECT * from photos
    return view("firstcontroller.index", ["photos" => $photos]);
  }

  public function about()
  {
    return view("firstcontroller.about");
  }

  public function create()
  {
    return view("firstcontroller.create");
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|min:3|max:255',
      'note' => 'numeric|min:0|max:20',
      'image' => 'required|mimes:jpg,bmp,png'
    ]);

    $p = new Photo();
    $p->title = $request->input("title");

    $name = $request->file("image")->hashName();
    $request->file("image")->move("images/upload/" . Auth::id(), $name);
    $p->url = "/images/upload/" . Auth::id() . "/$name";

    $p->note = $request->input("note");
    $p->user_id = Auth::id();
    $p->save(); // INSERT .....
    return redirect("/");
  }

  public function users($id)
  {
    $user = User::findOrFail($id);
    return view("firstcontroller.users", ["user" => $user]);
  }

  public function changesuivi($id)
  {
    $user = User::findOrFail($id);
    Auth::user()->IFollowThem()->toggle($id);
    return back();
  }

  public function likes($id)
  {
    Auth::user()->likes()->toggle($id);
    return back();
  }

  public function updateoverview(Request $request)
  {
    $overview = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $request->input('overview'));
    Auth::user()->overview = $overview;
    Auth::user()->save();
    return back();
  }
}
