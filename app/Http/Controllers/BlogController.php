<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //
    protected $limit=3;
    public function index(){
       $posts=POST::with('user')
       ->latestFirst()
       ->published()
       ->simplePaginate($this->limit);
       return view("blog.index",compact('posts'));
       
    }
}
