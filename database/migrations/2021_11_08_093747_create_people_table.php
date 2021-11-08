<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthday');
            $table->string('birth_place');
            $table->integer('sex');
            $table->string('race');
            $table->string('job')->nullable();
            $table->string('work_place')->nullable();
            $table->integer('id_number')->nullable();
            $table->string('idn_receive_place')->nullable();
            $table->date('idn_receive_date')->nullable();
            $table->string('register_place')->nullable();
            $table->date('register_date')->nullable();
            $table->string('owner_relation');
            $table->integer('status');
            $table->integer('family_id');
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
        Schema::dropIfExists('people');
    }
}
