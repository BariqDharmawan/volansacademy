<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('value');
            $table->text('link');
            $table->boolean('is_address')->default(false);
            $table->enum('platform', ['instagram', 'whatsapp', 'custom']);
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
        Schema::dropIfExists('our_contacts');
    }
}
