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
        Schema::create('l_pendings', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('typesId');
            $table->float('weight');
            $table->string('owner');
            $table->timestamps();

            $table->foreign('typesId')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('l_pendings');
    }
};
