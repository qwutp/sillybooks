<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('cover_image');
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->string('publisher');
            $table->integer('year');
            $table->integer('pages');
            $table->string('language');
            $table->boolean('is_bestseller')->default(false);
            $table->float('average_rating')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
