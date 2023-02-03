<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'admin',
            'contact'             => '503774416',
            'email'             => 'admin@admin.com',
            'password'             => bcrypt('12345678'),
        ]);
    }
}
