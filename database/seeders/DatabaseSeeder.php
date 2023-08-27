<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Option;
use App\Models\Admin\property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithConsoleEvents;

class DatabaseSeeder extends Seeder
{
    use WithConsoleEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@gmail.com'
        ]);

        $option = Option::factory(10)->create();
        property::factory(50)
        ->create();
        
    }
}
