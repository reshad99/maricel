<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Card::truncate();
        Card::create([
        'photo' => '100.png',
        'name_az' => '100 AZN',
        'name_en' => '100 AZN',
        'name_ru' => '100 AZN',
        'text_az' => 'dsafsd',
        'text_en' => 'adfadf',
        'text_ru' => 'adfdaf'
        ]);

        Card::create([
        'photo' => '180.png',
        'name_az' => '180 AZN',
        'name_en' => '180 AZN',
        'name_ru' => '180 AZN',
        'text_az' => 'dsafsd',
        'text_en' => 'adfadf',
        'text_ru' => 'adfdaf'
        ]);

        Card::create([
        'photo' => '250.png',
        'name_az' => '250 AZN',
        'name_en' => '250 AZN',
        'name_ru' => '250 AZN',
        'text_az' => 'dsaafaffsd',
        'text_en' => 'adfadfadf',
        'text_ru' => 'adfafdfdaf'
        ]);

        Card::create([
        'photo' => '300.png',
        'name_az' => '300 AZN',
        'name_en' => '300 AZN',
        'name_ru' => '300 AZN',
        'text_az' => 'dsaafaffsd',
        'text_en' => 'adfaafadfadf',
        'text_ru' => 'adfaffdfdaf'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
