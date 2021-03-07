<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insertOrIgnore([
        ['id' => 1, 'category' => 'Последние' ,'created_at' => now()],
        ['id' => 2, 'category' => 'Интересные' ,'created_at' => now()],
        ['id' => 3, 'category' => 'Обьявления' ,'created_at' => now()],
        ['id' => 4, 'category' => 'Спорт' , 'created_at' => now()]
      ]);
    }
}
