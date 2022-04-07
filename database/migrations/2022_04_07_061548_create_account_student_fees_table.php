<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_student_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('student_id')->nullable();
            $table->unsignedInteger('fee_category_id')->nullable();
            $table->date('date')->nullable();
            $table->double('amount')->nullable();
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
        Schema::dropIfExists('account_student_fees');
    }
}
