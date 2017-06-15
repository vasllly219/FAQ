<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                  'name'=>'admin',
                  'email'=>'admin@test.ru',
                  'password'=>bcrypt('admin'),
                  ]);
        DB::table('categories')->insert(['category'=>'Main']);

        DB::table('faq')->insert(['category_id'=>'1', 
                                'question'=>'Как это работает?',
                                'answer'=>'Да кто бы знал!',
                                'user'=>'Test',
                                'email'=>'test@test.ru',
                                'public'=>'1'
                                ]);
    }
}
