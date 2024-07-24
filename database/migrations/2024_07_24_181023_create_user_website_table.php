<?php

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // this is a pivot table to set subscription relation
        // between users and websites
        Schema::create('user_website', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignIdFor(Website::class)
                ->references('id')
                ->on('websites')
                ->cascadeOnDelete();
            $table->unique(['user_id', 'website_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_website');
    }
};
