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
        Schema::create('data', function (Blueprint $table) {
            
            $table->uuid('id')->primary()->unique();
            $table->string('key');
            $table->double('temperature');
            $table->double('humidity');
            $table->integer('flameSensor');
            $table->integer('smokeSensor');
            $table->double('latitude');
            $table->double('longitude');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
