<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Answerkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerkeys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('dersgrup_id');
            $table->enum('correctanswer',['A','B','C','D','E']);
            $table->decimal('katsayi');
            $table->string('subject');
            $table->enum('kitapcik',['A','B','C','D']);
            $table->timestamps();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('dersgrup_id')->references('id')->on('dersgruplari')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answerkeys');
    }
}
