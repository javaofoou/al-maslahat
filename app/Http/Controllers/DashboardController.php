<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Exco;

class DashboardController extends Controller
{
    public function index()
    {
        $posts_count = Post::count();
        $blogs_count = Blog::count();
        $events_count = Event::count();
        $excos_count = Exco::count();

        $latest_posts = Post::latest()->take(5)->get();
        $latest_blogs = Blog::latest()->take(5)->get();
        $upcoming_events = Event::latest()->take(5)->get();

        return view('dashboard', compact(
            'posts_count', 'blogs_count', 'events_count', 'excos_count',
            'latest_posts', 'latest_blogs', 'upcoming_events'
        ));
    }
}

