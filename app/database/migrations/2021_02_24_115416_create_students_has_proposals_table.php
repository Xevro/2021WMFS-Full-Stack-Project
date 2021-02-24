<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsHasProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_has_proposals', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();
            $table->unsignedBigInteger('student_id')->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('proposal_id')->index();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->primary(['student_id', 'proposal_id']);
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
