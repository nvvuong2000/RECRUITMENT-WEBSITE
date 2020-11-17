<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl:user', function (Blueprint $table) {
            $table->Increments('user_id');
            $table->string('user_email',100);
            $table->string('user_taikhoan');
            $table->string('user_matkhau');
            $table->string('user_hoten');
            $table->string('user_sdt');
            $table->string('user_ngaysinh');
            $table->string('user_diachi');
            $table->string('user_quyen');
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
        Schema::dropIfExists('tbl:user');
    }
}
