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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password')->default(Hash::make(123456));
            $table->tinyInteger('user_type')->default(1)->comment('1:admin, 2:teacher, 3:student');
            $table->string('nis')->unique()->nullable();
            $table->string('name');
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->integer('class_id')->nullable();
            $table->tinyInteger('is_delete')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
