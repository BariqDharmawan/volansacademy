<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
			$table->dropColumn('whatsapp');		
			$table->dropColumn('line_id');		
			$table->dropColumn('instagram_id');		
			$table->dropColumn('place_of_birth');		
			$table->dropColumn('date_of_birth');		
			$table->dropColumn('address');		
			$table->dropColumn('domicili');		
			$table->dropColumn('university');		
			$table->dropColumn('class');		
			$table->dropColumn('school');		
			$table->dropColumn('major');		
			$table->dropColumn('semester');	
        });
    }
}
