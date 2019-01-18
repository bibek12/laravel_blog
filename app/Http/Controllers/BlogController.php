<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use Carbon\Carbon;

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

    public function category(Category $category){
        $categoryName=$category->title;
      
     
    //     $posts=POST::with('user')
    //    ->latestFirst()
    //    ->published()
    //    ->where('category_id',$id)
    //    ->simplePaginate($this->limit);
       // \DB::enableQueryLog();
        $posts=$category->posts()
                        ->with('user')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
      
       return view("blog.index",compact('posts','categoryName'));
       //dd(\DB::getQueryLog());
    }

    public function show(Post $post){
       
     
       return view("blog.show",compact('post'));
    }
}
