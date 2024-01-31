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
        Schema::table('languages', function (Blueprint $table) {
            //
          // Add user_id column
          $table->unsignedBigInteger('user_id')->nullable();

          // Add foreign key constraint
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            //
              // Remove the foreign key constraint
              $table->dropForeign(['user_id']);

              // Drop the user_id column
              $table->dropColumn('user_id');
        });
    }
};
