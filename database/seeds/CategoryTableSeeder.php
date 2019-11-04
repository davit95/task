<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            ['name' => 'php', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'js', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ruby', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'c++', 'created_at' => now(), 'updated_at' => now()]
        );
        if (DB::table('categories')->get()->count() == 0) {
            DB::table('categories')->insert($categories);
        }
    }
}
