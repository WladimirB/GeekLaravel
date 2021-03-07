<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
      $faker = Factory::create('ru_RU');

      $data=[];

      for($i = 0; $i < 10; $i++) {
        $data[] = [
          'title' => $faker->realText(rand(10,30)),
          'content' => $faker->realText(rand(200,500)),
          'autor_id' => rand(1,5),
          'created_at' => now(),
          'category_id' => rand(1,4),
          'source_id' => rand(1,5)
        ];
      }
      return $data;
    }

}
