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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('forname');
            $table->string('surname');
            $table->string('add1');
            $table->string('add2');
            $table->string('add3');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->tinyInteger('registered');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
