<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subclasses', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('class_id');
			$table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');
            $table->string('name');
			$table->string('icon')->nullable();
			$table->text('description');
			$table->text('facilities');
			$table->string('periode');
			$table->decimal('price', 20, 2);
			$table->decimal('price_discount', 20, 2)->default(0);
			$table->tinyInteger('inactive')->default(0);
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
        Schema::dropIfExists('subclasses');
    }
}
