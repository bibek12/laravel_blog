<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use Carbon\Carbon;
use App\User;

class BlogController extends Controller
{
    //
    protected $limit=3;
    public function index(){

        $posts=POST::with('user')
       ->latestFirst()
       ->published()
       ->filter(request('term'))
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

    public function author(User $author){
        $authorName=$author->name;
        //\DB::enableQueryLog();
        $posts=$author->posts()
                       ->with('category')
                       ->latestFirst()
                       ->published()
                       ->simplePaginate($this->limit);
       return view('blog.index',compact('posts','authorName'));
       // dd(\DB::getQueryLog());
    }
    public function show(Post $post){
    //    $viewCount=$post->view_count+1;
    //     $post->update(['view_count'=>$viewCount]);
       $post->increment('view_count');
       return view("blog.show",compact('post'));
    }
}
