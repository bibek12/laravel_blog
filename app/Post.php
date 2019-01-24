<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Post;


class Post extends Model
{
    protected $fillable=['title','slug','excerpt','body','published_at','category_id','view_count','image'];
    protected $dates=['published_at'];
    
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    //u
    public function setPublishedAtAttribute($value){
        return $this->attributes['published_at']=$value?:NULL;
    }
    public function getImageUrlAttribute($value){
        $imageUrl="";
        if(!is_null($this->image)){
            $imagePath=public_path()."/img/".$this->image;
            if(file_exists($imagePath)) $imageUrl=asset("img/".$this->image);
        }
        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value){
        $imageUrl="";

        if(!is_null($this->image)){
            $ext=substr(strrchr($this->image,'.'),1);
            $thumbnail=str_replace(".{$ext}","_thumb.{$ext}",$this->image);
            $imagePath=public_path()."/img/".$thumbnail;
            if(file_exists($imagePath)) $imageUrl=asset("img/".$thumbnail);
        }
        return $imageUrl;
    }

    public function getDateAttribute($value){
        return is_null($this->published_at)? '':$this->published_at->diffForHumans();
    }

    public function dateFormatted($showTimes=false){
        $format='d/m/y';
        if($showTimes) $format=$format." H:i:s";
        return $this->created_at->format($format);
    }

    public function publicationLabel(){

        if(! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
         }
        else if($this->published_at && $this->published_at->isFuture() ){
            return '<span class="label label-info">Scheduled</span>';
        }
        else{
            return '<span class="label label-success">Published</span>';
        }
        
    }
    public function scopeLatestFirst($query){
        return $query->orderBy('created_at','desc');
    }

    public function scopePopular($query){
        return $query->orderBy('view_count','desc');
    }

    public function scopePublished($query){
        return $query->where("published_at","<=",Carbon::now());
    }
   
    public function getBodyHtmlAttribute($value){
        return $this->body? Markdown::convertToHtml(e($this->body)):NUll;
    }

    public function getExcerptHtmlAttribute($value){
        return $this->excerpt?Markdown::convertToHtml(e($this->excerpt)):NULL;
    }
   
}
