<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
        DB::table('user')->insert([
            'username' => 'user',
            'password' => 'user123',
        ]);

        DB::table('language')->delete();
        DB::table('language')->insert([
            'language_id' => '1',
            'code' => 'ua',
            'label' => 'ua',
        ]);
        DB::table('language')->insert([
            'language_id' => '2',
            'code' => 'en',
            'label' => 'en',
        ]);
        DB::table('language')->insert([
            'language_id' => '3',
            'code' => 'de',
            'label' => 'de',
        ]);
    }
}
