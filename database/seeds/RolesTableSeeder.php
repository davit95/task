<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'client', 'created_at' => now(), 'updated_at' => now()]
        );
        if ( DB::table('roles')->get()->count() == 0 ) {
            DB::table('roles')->insert($roles);
        }
    }
}
