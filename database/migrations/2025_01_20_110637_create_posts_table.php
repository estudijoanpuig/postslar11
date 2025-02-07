<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->integer('category_id')->nullable()->index('categoria_id');
            $table->string('excerpt', 500)->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('url')->nullable();
            $table->string('ins')->nullable();
            $table->string('face')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
