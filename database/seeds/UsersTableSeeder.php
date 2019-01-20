<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset user table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        DB::table('users')->truncate();

        $faker=Factory::create();

        //create 3 users/authors
        DB::table('users')->insert([
            [
                'name'=>'bibek',
                'slug'=>'bibek',
                'email'=>'sbibek100@gmail.com',
                'password'=>bcrypt('secret'),
                'bio'=>$faker->text(rand(200,250))
            ],
            [
                'name'=>'safalta',
                'slug'=>'safalta',
                'email'=>'safalta@gmail.com',
                'password'=>bcrypt('secret'),
                'bio'=>$faker->text(rand(200,250))
            ],
            [
                'name'=>'babita',
                'slug'=>'babita',
                'email'=>'babita@gmail.com',
                'password'=>bcrypt('secret'),
                'bio'=>$faker->text(rand(200,250))
            ]
        ]);
        
    }
}
