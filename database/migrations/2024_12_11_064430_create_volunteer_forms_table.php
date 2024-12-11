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
        Schema::create('volunteer_forms', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->text('description'); 
            $table->string('creator')->nullable();  // Make creator nullable if you don't always want to require it
            $table->string('link'); 
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_forms');
    }
};
