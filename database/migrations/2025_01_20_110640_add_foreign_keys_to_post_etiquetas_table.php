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
        Schema::table('post_etiquetas', function (Blueprint $table) {
            $table->foreign(['etiqueta_id'], 'post_etiquetas_ibfk_1')->references(['id'])->on('etiquetas')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['post_id'], 'post_etiquetas_ibfk_2')->references(['id'])->on('posts')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_etiquetas', function (Blueprint $table) {
            $table->dropForeign('post_etiquetas_ibfk_1');
            $table->dropForeign('post_etiquetas_ibfk_2');
        });
    }
};
