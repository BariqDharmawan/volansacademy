<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectattachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectattachments', function (Blueprint $table) {
            $table->id();
            $table->string('file');
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
        Schema::dropIfExists('projectattachments');
    }
}
