<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id')->default(2);
            $table->string('phone')->nullable();
			$table->string('whatsapp')->nullable();
			$table->string('line_id')->nullable();		
			$table->string('instagram_id')->nullable();		
			$table->string('place_of_birth')->nullable();		
			$table->date('date_of_birth')->nullable();		
			$table->longText('address')->nullable();		
			$table->longText('domicili')->nullable();		
			$table->string('university')->nullable();		
			$table->string('class')->nullable();		
			$table->string('school')->nullable();		
			$table->string('major')->nullable();		
			$table->string('semester')->nullable();	
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
