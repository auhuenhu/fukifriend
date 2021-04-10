<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensp');
            $table->text('mota');
            $table->string('hinh');
            $table->integer('idLoai');
            $table->integer('idLoaiChiTiet');
            $table->integer('gia');
            $table->integer('soluong');
            $table->dateTime('ngaynhap');
            $table->json('dacdiem');
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
        Schema::dropIfExists('sanpham');
    }
}
