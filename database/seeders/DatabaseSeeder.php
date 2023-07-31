<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
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
        Storage::deleteDirectory('imagen');
        Storage::makeDirectory('imagen');

        \App\Models\Post::factory(100)->create();
        
    }
}
