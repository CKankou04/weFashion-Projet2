<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        //creation de l'utilisation Edouard
        User::factory()->create([
            'name' => 'Edouard',
            'email' => 'edouard@gmail.com',
        ]);
        $this->call(ProductSeeder::class);
    }
}
