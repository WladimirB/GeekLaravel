<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;


class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source_of_news')->insert($this->getData());
    }

    private function getData()
    {
      $faker = Factory::create('ru_RU');

      $data = [];

      for ($i = 0; $i < 5; $i++) {
        $data[] = [
          'source' => $faker->company().$faker->companySuffix(),
          'is_actual' => rand(0,1)
        ];
      }
      return $data;
    }
}
