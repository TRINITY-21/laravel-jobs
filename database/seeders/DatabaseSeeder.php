<?php

namespace Database\Seeders;

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
        $user =  \App\Models\User::factory()->create([
            'name' => 'Frank',
            'email' => 'frank@gmail.com',
        ]);


        \App\Models\Listings::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}