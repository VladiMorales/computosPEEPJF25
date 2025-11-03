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
        Schema::create('mc', function (Blueprint $table) {
            $table->id();
            $table->string('V1');
            $table->string('V2');
            $table->string('V3');
            $table->string('V4');
            $table->string('V5');  
            $table->string('V6');
            $table->string('V7');
            $table->string('V8');  
            $table->string('status');       
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mc');
    }
};
