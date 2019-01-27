<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the role table
        DB::table('roles')->truncate();
        //admin role
        $admin=new Role();
        $admin->name='admin';
        $admin->display_name='Admin';
        $admin->save();

        //editor role
        $editor=new Role();
        $editor->name='editor';
        $editor->display_name='Editor';
        $editor->save();

        //author role
         $author=new Role();
        $author->name='author';
        $author->display_name='Author';
        $author->save();

        //assign role to user

        //first user as admin
        $user1=User::findOrFail(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

         //second user as editor
         $user2=User::findOrFail(2);
         $user2->detachRole($editor);
         $user2->attachRole($editor);

         
          //third user as author
        $user3=User::findOrFail(3);
        $user3->detachRole($author);
        $user3->attachRole($author);



        
        
    }
}
