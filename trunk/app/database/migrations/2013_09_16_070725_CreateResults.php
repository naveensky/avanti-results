<?php

use Illuminate\Database\Migrations\Migration;

class CreateResults extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function ($table) {
            $table->increments('id');
            $table->string('name', 1000);
            $table->string('rollNumber', 100)->unique();
            $table->date('dob')->nullable();
            $table->string('schoolName', 1000)->nullable();
            $table->date('testDate')->nullable();
            $table->boolean('result')->nullable();
            $table->string('nextSteps')->nullable();
            $table->string('city')->nullable();
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
        Schema::drop('results');
    }

}