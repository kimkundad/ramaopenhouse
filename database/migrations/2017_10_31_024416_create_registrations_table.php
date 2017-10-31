<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix_name');
            $table->string('name');
            $table->string('surname');
            $table->integer('age');
            $table->string('educational_background');
            $table->string('educational_plan');
            $table->string('school_name');
            $table->float('gpax', 8, 2);
            $table->integer('edu_rank_1');
            $table->integer('edu_rank_2');
            $table->integer('edu_rank_3');
            $table->integer('edu_rank_4');
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
        Schema::dropIfExists('registrations');
    }
}
