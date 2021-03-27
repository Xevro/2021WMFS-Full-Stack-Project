<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->boolean('visibility')->default(0);
            $table->string('status')->default('In afwachting');
            $table->text('description');
            $table->date('start_period');
            $table->date('end_period');
            $table->string('contract_file_location')->nullable();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('mentor_id')->constrained()->nullable();
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
        Schema::dropIfExists('proposals');
    }
}
