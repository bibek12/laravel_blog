<?php

function check_user_permissions($request,$actionName=Null,$id=Null){

     //get current login user
     $currentUser=$request->user();
     //current action name
     if($actionName){
         $currentActionName=$actionName;
     }else{
         $currentActionName=$request->route()->getActionName();
     }
     list($controller,$method)=explode('@',$currentActionName);
     $controller=str_replace(["App\\Http\\Controllers\\Backend\\","Controller"],"",$controller);
     $crudPermissionsMap=[
         'crud'=>['create','store','edit','update','destroy','restore','forceDestroy','index','view']
     ];

     $classesMap=[
         'Blog'=>'post',
         'Categories'=>'category',
         'User'=>'user'
     ];

     foreach ($crudPermissionsMap as $permissions => $methods) {
         // if current methods exist in the method list
         //we all check the permission
         if(in_array($method,$methods) && isset($classesMap[$controller])){
             $className=$classesMap[$controller];

             //
             if($className=='post' && in_array($method,['edit','update','destroy','restore','forceDestroy'])){
                 $id=!is_null($id)?$id:$request->route('blog');
                 //if current user has not update-other post/delete-others post permissions
                 //make sure he/she only modify his/her own post
                     if($id&&(!$currentUser->can('update-other-post') || !$currentUser->can('delete-other-post'))){
                    $post=\App\Post::withTrashed()->find($id);
                    if($post->user_id!==$currentUser->id){
                         return false;
                    }
                    
                 }
             }
             if(!$currentUser->can("{$permissions}-{$className}")){
                 return false;
             }
             break;
         }
     }

     return true; 
}