<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tintuyendung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuyendung', function (Blueprint $table) {
            $table->increments('id_tintuyendung');
            $table->integer('id_doanhnghiep');
            $table->integer('id_trinhdo');
            $table->integer('id_chucvu');
            $table->integer('id_kinhnghiem');
            $table->integer('id_mucluong');
            $table->integer('id_hinhthuclamviec');
            $table->integer('id_loainganhnghe');
            $table->integer('id_soluong');
            $table->string('mota');
            $table->string('gioitinh');
            $table->datetime('hannophoso');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuyendung');
    }
}
