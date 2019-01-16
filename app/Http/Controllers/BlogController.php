<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //
    public function index(){
        $posts=POST::all();
        return view("blog.index",compact('posts'));
    }
}
