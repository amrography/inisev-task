<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createWebsites()
            ->createUsers();
    }

    private function createWebsites(): self
    {
        Website::factory(10)
            ->create();

        return $this;
    }

    private function createUsers(): self
    {
        User::factory(10)
            ->create();

        return $this;
    }
}
