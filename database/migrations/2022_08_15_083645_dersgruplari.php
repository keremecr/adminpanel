<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dersgruplari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dersgruplari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ders_id');
            $table->unsignedBigInteger('grup_id');
            $table->decimal('katsayi');
            $table->timestamps();
            $table->foreign('ders_id')->references('id')->on('dersler')->constrained();
            $table->foreign('grup_id')->references('id')->on('gruplar')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dersgruplari');
    }
}
