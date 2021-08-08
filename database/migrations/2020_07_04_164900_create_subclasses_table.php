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
            $table->string('banner');
            $table->string('detail_info_program');
            $table->string('garansi_program');
            $table->string('garansi_program_2');
            $table->string('gambar_profesi_1');
            $table->string('gambar_profesi_2');
            $table->string('banner_konfirmasi');
            $table->string('fasilitas_program');
            $table->string('fasilitas_bimbel');
            $table->string('lokasi_belajar');
            $table->string('banner_alumni');
            $table->string('video_alumni_testi_1', 55);
            $table->string('video_alumni_testi_2', 55);
            $table->string('thumbnail_video_alumni_testi_1', 55);
            $table->string('thumbnail_video_alumni_testi_2', 55);
            $table->string('banner_tagline');
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
