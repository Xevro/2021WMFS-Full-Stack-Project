<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentHasProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_has_proposals', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();
            $table->unsignedInteger('student_id')->index();
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedInteger('product_id')->index();
            $table->foreign('proposals_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->primary(['student_id', 'proposals_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_has_proposals');
    }
}
