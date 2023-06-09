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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            
            $table->string('name')->unique();
            $table->string('address');
            $table->string('contact');
            $table->string('website');
            $table->string('social_link')->nullable();
            $table->string('description')->nullable();
            

            $table->foreignId('user_id')
                  ->constrained(table: 'users', column: 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
