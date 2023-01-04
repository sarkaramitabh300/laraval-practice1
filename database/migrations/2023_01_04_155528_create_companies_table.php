<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();//unsignedBigInteger() -> UNSIGNED BIG INTEGER PRIMARY KEY AUTO_INCREMENT
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->comment('Email of the company');
            $table->timestamps();// CREATED_AT, UPDATED AT-> IN TIMESTAMP
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
