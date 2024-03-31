<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Miembro;
use App\Models\Ministerio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        Miembro::factory(100)->create();
        Ministerio::factory(10)->create();

        User::create([
            "name" => "javier",
            "email" => "javier1001@live.com.ar",
            "password" => bcrypt("admin")
        ])->assignRole('admin');

        User::create([
            "name" => "invitado",
            "email" => "invitado@gmail.com.ar",
            "password" => bcrypt("invitado")
        ])->assignRole('invitado');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
