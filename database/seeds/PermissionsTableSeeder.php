<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the permission table
        DB::table('permissions')->truncate();

        //crud
        $crudPost=new Permission();
        $crudPost->name="crud-post";
        $crudPost->save();
        //update other post
        $updateOtherPost=new Permission();
        $updateOtherPost->name="update-other-post";
        $updateOtherPost->save();
        //delete other post 
        $deleteOtherPost=new Permission();
        $deleteOtherPost->name="delete-other-post";
        $deleteOtherPost->save();
        //crud category
        $crudCategory=new Permission();
        $crudCategory->name="crud-category";
        $crudCategory->save();
        //crud user
        $crudUser=new Permission();
        $crudUser->name="crud-user";
        $crudUser->save();

        //attach role permission

        //admin role
        $admin=Role::whereName('admin')->first();
        $admin->detachPermissions([$crudPost,$updateOtherPost,$deleteOtherPost,$crudCategory,$crudUser]);
        $admin->attachPermissions([$crudPost,$updateOtherPost,$deleteOtherPost,$crudCategory,$crudUser]);
        
        //editor permission
        $editor=Role::whereName('editor')->first();
        $editor->detachPermissions([$crudPost,$updateOtherPost,$deleteOtherPost,$crudCategory]);
        $editor->attachPermissions([$crudPost,$updateOtherPost,$deleteOtherPost,$crudCategory]);

        //author permission
        $author=Role::whereName('author')->first();
        $author->detachPermissions([$crudPost]);
        $author->attachPermissions([$crudPost]);
    }
}
