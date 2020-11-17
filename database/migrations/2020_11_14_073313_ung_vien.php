<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UngVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:UngVien', function (Blueprint $table) {
            $table->increments('ungvien_id');
            $table->integer('user_id');
            $table->integer('nganhnghe_id');
            $table->integer('hinhthuc_id');
            $table->integer('thanhpho_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl:UngVien');
    }
}
