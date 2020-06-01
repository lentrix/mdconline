<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrols', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->string('email');
            $table->string('phone', 15);
            $table->string('program', 15);
            $table->string('level', 1);
            $table->string('status',20)->default('pending');
            $table->string('code', 8);
            $table->bigInteger('payment_verified_by')->unsigned()->nullable();
            $table->bigInteger('records_verified_by')->unsigned()->nullable();
            $table->bigInteger('processed_by')->unsigned()->nullable();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('payment_verified_by')->references('id')->on('users');
            $table->foreign('records_verified_by')->references('id')->on('users');
            $table->foreign('processed_by')->references('id')->on('users');
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
        Schema::dropIfExists('enrols');
    }
}
