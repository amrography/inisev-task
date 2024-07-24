<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        // this is a pivot table to set sent subscription relation
        // between users and websites
        Schema::create('post_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignIdFor(Post::class)
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_user');
    }
};
