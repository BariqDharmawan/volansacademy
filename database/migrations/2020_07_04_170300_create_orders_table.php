<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('subclass_id');
			$table->foreign('subclass_id')
                ->references('id')
                ->on('subclasses')
                ->onDelete('cascade');
            $table->decimal('price', 20, 2);
			$table->decimal('discount', 20, 2);
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
			$table->string('for_account');
			$table->string('coupon');
			$table->string('status');
			$table->string('orderid')->nullable();
			$table->string('transaction_id')->nullable();
			$table->string('pdf_url')->nullable();
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
