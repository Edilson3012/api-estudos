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
        Schema::create('supports', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('user_id', 36);
            // $table->foreign('user_id')->references('id')->on('users');

            $table->string('lesson_id', 36);
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->text('description')->nullable();
            $table->enum('status', ['P', 'A', 'C' ])->default('P');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
