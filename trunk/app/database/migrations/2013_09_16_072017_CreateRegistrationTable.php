<?php

use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function ($table) {
            $table->increments('id');
            $table->string('name', 1000);
            $table->string('mobile', 20);
            $table->string('city', 100);
            $table->dateTime('registrationDate');
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
        Schema::drop('registrations');
    }
}