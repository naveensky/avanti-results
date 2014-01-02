<?php

use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table users
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password', 64);
            $table->timestamps();
        });

        //create table roles
        Schema::create('roles', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        //create Users Roles table
        Schema::create('role_user', function ($table) {
            $table->increments('id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->integer('role_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });




        DB::table('roles')->insert(
            array(array('id' => 1,
                'name' => 'admin', 'created_at' => new DateTime(), 'updated_at' => new DateTime()
            )
            ));

        DB::table('users')->insert(
            array(array('id' => 1,
                'email' => 'admin@admin.com', 'password' => Hash::make('asdf1234'), 'created_at' => new DateTime(), 'updated_at' => new DateTime()
            )
            ));
        DB::table('role_user')->insert(
            array(
                array('id' => 1, 'role_id' => 1, 'user_id' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime())
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


        Schema::table('role_user', function ($table) {
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropForeign('role_user_role_id_foreign');
        });

        //drop users
        Schema::drop('users');
        Schema::drop('roles');
        Schema::drop('role_user');


    }

}