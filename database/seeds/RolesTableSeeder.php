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
        $roles = ['Admin', 'User'];
        for ($i=0; $i < count($roles); $i++) {
            DB::table('roles')->insert([
                'role' => $roles[$i]
            ]);
        }
    }
}
