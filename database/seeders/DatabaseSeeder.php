<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for ($i = 0; $i < 8; $i++) {
        //     DB::table('websites')->insert([
        //         'ss' => Str::random(10),
        //         'css' => Str::random(10),
        //         'visible' => true,
        //         'type' => 'afl2',
        //         'user_id'=> 1
        //     ]);
        // }
    }
}
