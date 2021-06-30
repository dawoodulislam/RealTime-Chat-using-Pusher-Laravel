<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index()
    {
        return view('front.home.home', [
            'services' => Service::where('status', 1)->get()
        ]);
    }

    public function servicePost()
    {
        return view('front.service.post', [
            'posts' => Post::where('approve', 1)->get()
        ]);
    }
}
