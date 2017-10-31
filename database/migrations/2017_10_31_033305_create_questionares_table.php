<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_01');
            $table->integer('question_02');
            $table->integer('question_03');
            $table->integer('question_04');
            $table->integer('question_05');
            $table->integer('question_06');
            $table->integer('question_07');
            $table->integer('question_08');
            $table->integer('question_09');
            $table->integer('question_10');
            $table->text('11_text');
            $table->string('time_stamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionares');
    }
}
