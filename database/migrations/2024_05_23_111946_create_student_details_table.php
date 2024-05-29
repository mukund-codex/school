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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('name_1')->nullable();
            $table->string('relation_1')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('relation_2')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('relation_3')->nullable();
            $table->string('contact_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
