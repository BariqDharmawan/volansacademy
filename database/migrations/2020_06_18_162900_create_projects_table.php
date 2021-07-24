<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
			$table->date('date_form_pm')->nullable();
			$table->string('no_form_pm')->nullable();
			$table->unsignedBigInteger('division_id')->nullable();
			$table->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');
			$table->unsignedBigInteger('producttype_id')->nullable();
            $table->foreign('producttype_id')
                ->references('id')
                ->on('producttypes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            $table->date('pef_date')->nullable();
			$table->string('pef_no')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->string('spk_pks')->nullable();
			$table->string('range_spk')->nullable();
			$table->decimal('amount_exclude_ppn', 20, 2)->nullable();
			$table->unsignedBigInteger('owner')->nullable();
			$table->foreign('owner')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
			$table->unsignedBigInteger('manager')->nullable();
			$table->foreign('manager')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
			$table->text('terms_of_payment')->nullable();
			$table->text('description')->nullable();
			$table->tinyInteger('is_closed')->defauul(0);
			$table->text('notes')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
