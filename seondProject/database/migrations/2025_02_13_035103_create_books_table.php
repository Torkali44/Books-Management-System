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
            $table->string("name");
            $table->longText("description");
            $table->double("price");
            $table->string("image")->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            
            $table->timestamps();
        });
        
        
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
