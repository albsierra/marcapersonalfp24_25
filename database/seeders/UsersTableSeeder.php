<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        if(User::count() == 0) {
            if(config('app.env') ==='local'){
                User::factory(10)->create();
                User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                ]);
            }
        }
    }
}
