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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('tazkera_no');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permenent_address');
            $table->string('join_year');
            $table->string('graduated_at')->nullable();
            $table->string('image')->nullable();
            $table->integer('current_senf_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
};
