<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Tuan',
            'lname' => 'Nguyen',
            'username' => 'adsd',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'email' => 'tuan@gmail.com',
            'password' => bcrypt('Admin123!'),
            'role_id' => 1,
        ]);
    }
}
