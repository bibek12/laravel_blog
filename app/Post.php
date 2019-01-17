<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
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
        return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst($query){
        return $this->orderBy('created_at','desc');
    }
   
    
   
}
