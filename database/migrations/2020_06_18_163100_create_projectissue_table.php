<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectissueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectissues', function (Blueprint $table) {
            $table->id();
            $table->string('issue');
			$table->date('date');
			$table->unsignedBigInteger('project_id')->nullable();
			$table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
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
        Schema::dropIfExists('projectissues');
    }
}
