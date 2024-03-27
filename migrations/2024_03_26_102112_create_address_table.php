<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    public function up()
    {
        Schema::create('address', function (Blueprint $table) { // Perbaiki penulisan nama tabel
            $table->id();
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
            $table->unsignedBigInteger('contact_id'); // Perbaiki penulisan tipe data foreign key
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade'); // Sesuaikan nama tabel yang dirujuk
        });
    }

    public function down()
    {
        Schema::dropIfExists('address');
    }
}
