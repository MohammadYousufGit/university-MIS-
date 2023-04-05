<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('senf_subject_id')->unsigned();
            $table->integer('sutdent_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date')->unsigned();
            $table->boolean('present');
            $table->smallInteger('lesson')->unsigned() ;
            $table->string('status')->nullable();
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
        Schema::dropIfExists('student_subject_attendances');
    }
};
