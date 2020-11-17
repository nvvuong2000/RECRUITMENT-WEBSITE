<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KinhNghiemCuaUV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:KinhNghiemCuaUV', function (Blueprint $table) {
            $table->increments('id_kinhnghiemuv');
            $table->integer('id_ungvien');
            $table->string('tencongty');
            $table->datetime('batDau');
            $table->datetime('ketthuc');
            
            $table->string('chucvu');
            $table->string('mota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl:KinhNghiemCuaUV');
    }
}
