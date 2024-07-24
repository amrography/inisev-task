<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createWebsites();
    }

    private function createWebsites()
    {
        Website::factory(10)
            ->create();
    }
}
