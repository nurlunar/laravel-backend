<?php

use Illuminate\Database\Seeder;


class kontak extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker =Faker\Factory::create();
        $limit = 20;

        for ($i=0; $i<$limit; $i++){

        	DB::table('admin')->insert([
              'username'=>$faker->username,
              'password'=>$faker->password

        	]);
        }
    }
}
