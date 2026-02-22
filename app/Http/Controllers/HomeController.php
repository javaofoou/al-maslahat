<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Blog;
use App\Models\Exco;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Event::latest()->take(5)->get(); // can be slider images
        $posts = Post::latest()->take(6)->get();
        $blogs = Blog::latest()->take(6)->get();
        $excos = Exco::all();
        $events = Event::latest()->take(6)->get(); // if you define upcoming scope
        $donate_account = '0123456789'; // your org account number

        return view('home', compact('sliders', 'posts', 'blogs', 'excos', 'events', 'donate_account'));
    }
}