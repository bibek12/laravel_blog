<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Post extends Model
{
    protected $dates=['published_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    //u
    public function getImageUrlAttribute($value){
        $imageUrl="";
        if(!is_null($this->image)){
            $imagePath=public_path()."/img/".$this->image;
            if(file_exists($imagePath)) $imageUrl=asset("img/".$this->image);
        }
        return $imageUrl;
    }

    public function getDateAttribute($value){
        return is_null($this->published_at)? '':$this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query){
        return $query->orderBy('created_at','desc');
    }

    public function scopePublished($query){
        return $query->where("published_at","<=",Carbon::now());
    }
   
    
   
}
