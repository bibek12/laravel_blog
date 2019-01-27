<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset categories table
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title'=>'Web Design',
                'slug'=>'web-design'
            ],
            [
                'title'=>'Web Programming',
                'slug'=>'web-programming'
            ],
            [
                'title'=>'Internet',
                'slug'=>'internet'
            ],
            [
                'title'=>'Social Networking',
                'slug'=>'social-networking'
            ],
            [
                'title'=>'Photography',
                'slug'=>'photography'
            ],
            [
                'title'=>'Uncategorized',
                'slug'=>'uncategorized'
            ],
        ]);

        //update the post data
        for($post_id=1;$post_id<=10;$post_id++){
            $category_id=rand(1,5);
            DB::table('posts')
            ->where('id',$post_id)
            ->update(['category_id'=>$category_id]);
        }
    }
}
