<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
        'name' => 'Admin',
        'email' => 'info@maricel.az',
        'password' => '$2y$10$/Fu98sA1vOFkMRfJ2Amf5uyOn5Pw.tj5qiRx/c3T6dB5VDIyxXB9C'
        ]);
    }
}
