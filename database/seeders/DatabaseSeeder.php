<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

        \App\Models\Position::insert([
            ['name' => 'HR Manager', 'basic_salary' => 15000000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff IT', 'basic_salary' => 8000000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Keuangan', 'basic_salary' => 10000000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        \App\Models\Division::insert([
            ['name' => 'Human Resources', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IT Department', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
