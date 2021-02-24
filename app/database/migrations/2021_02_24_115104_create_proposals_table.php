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
            $table->boolean('visibility');
            $table->string('status');
            $table->text('description');
            $table->date('start_period');
            $table->date('end_period');
            $table->string('contract_file_location');
            $table->integer('amount_likes');
            $table->foreignId('companies_id_company')->constrained();
            $table->foreignId('mentor_id')->constrained();
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
