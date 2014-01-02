<?php

use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function ($table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('name', 1000);
            $table->text('replyText');
            $table->timestamps();
        });

        DB::table('replies')->insert(
            array(
                array('code' => 1, 'name' => 'registration',
                    'replyText' => "Thank you for registering for test in Delhi. You will receive your roll number when you come for the test. We will get back to you shortly",
                    'created_at' => new DateTime(), 'updated_at' => new DateTime())
            )
        );
        DB::table('replies')->insert(
            array(
                array('code' => 2, 'name' => 'registration',
                    'replyText' => "Thank you for registering for test in Mumbai. You will receive your roll number when you come for the test. We will get back to you shortly",
                    'created_at' => new DateTime(), 'updated_at' => new DateTime())
            )
        );
        DB::table('replies')->insert(
            array(
                array('code' => 3, 'name' => 'registration',
                    'replyText' => "Thank you for registering for test in Kanpur. You will receive your roll number when you come for the test. We will get back to you shortly",
                    'created_at' => new DateTime(), 'updated_at' => new DateTime())
            )
        );
        DB::table('replies')->insert(
            array(
                array('code' => 4, 'name' => 'result',
                    'replyText' => "Dear Student, you have cleared the Level-1 exam. Avanti team will contact you by 10-September. Please visit the website for more details.",
                    'created_at' => new DateTime(), 'updated_at' => new DateTime())
            )
        );
        DB::table('replies')->insert(
            array(
                array('code' => 5, 'name' => 'result',
                    'replyText' => "Dear Student, you have not cleared the Level-1 exam and are not eligible for the scholarship. Please visit our Centre at \"address\" or visit our website for more information.",
                    'created_at' => new DateTime(), 'updated_at' => new DateTime())
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('replies');
    }

}