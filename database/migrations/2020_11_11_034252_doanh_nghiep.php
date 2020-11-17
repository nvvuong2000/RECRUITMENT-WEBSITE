<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class doanhnghiep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:doanhnghiep', function (Blueprint $table) {
            $table->Increments('doanhnghiep_id');
            $table->string('doanhnghiep_kinhdo');
            $table->string('doanhnghiep_vido');
            $table->string('doanhnghiep_ten');
            $table->string('doanhnghiep_sdt');
            $table->string('doanhnghiep_email');
            $table->string('doanhnghiep_fax');
            $table->string('doanhnghiep_website');
            $table->string('doanhnghiep_mota');
            $table->integer('doanhnghiep_TinhThanhPho');
            $table->string('doanhnghiep_Duong');
            $table->string('doanhnghiep_Phuong');
            $table->string('doanhnghiep_Quan');
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
        Schema::dropIfExists('tbl:nhatuyendung');
    }
}
