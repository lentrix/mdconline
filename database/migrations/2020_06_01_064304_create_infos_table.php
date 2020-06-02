<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('street');
            $table->string('bar');
            $table->string('town');
            $table->string('prov');
            $table->string('gender',6);
            $table->string('civil_status', 20);
            $table->date('bdate');
            $table->string('phone',20)->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('phone_parent',20)->nullable();
            $table->string('guardian')->nullable();
            $table->string('relation')->nullable();
            $table->string('phone_guardian',20)->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('elem_school');
            $table->string('elem_address');
            $table->string('elem_sy',10);
            $table->string('jhs_school')->nullable();
            $table->string('jhs_address')->nullable();
            $table->string('jhs_sy', 10)->nullable();
            $table->string('shs_school')->nullable();
            $table->string('shs_address')->nullable();
            $table->string('shs_sy', 10)->nullable();
            $table->string('tertiary_school')->nullable();
            $table->string('tertiary_address')->nullable();
            $table->string('tertiary_sy', 10)->nullable();
            $table->string('grad_school')->nullable();
            $table->string('grad_address')->nullable();
            $table->string('grad_sy', 10)->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('students')->onUpdate('cascade');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}
