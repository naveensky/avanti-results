<?php

use Illuminate\Database\Migrations\Migration;

class AddStatusAndCommentToRegistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('registrations', function ($table) {
            $table->string('status')->nullable();
            $table->text('remarks')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('registrations', function ($table) {
            $table->dropColumn('status');
            $table->dropColumn('remarks');
        });
	}

}