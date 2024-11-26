<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_users')->insert([
            'name'=>'Admin',
            'email'=>'admin@email.com',
            'password'=>bcrypt('admin123'),
            'type'=>'admin',
        ]);
    }
}
