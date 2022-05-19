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

        	DB::table('kontak')->insert([
              'nama'=>$faker->name,
              'nomor'=>$faker->phoneNumber

        	]);
        }
    }
}
