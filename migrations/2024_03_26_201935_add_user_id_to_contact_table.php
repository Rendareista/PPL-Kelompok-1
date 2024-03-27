<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact', function (Blueprint $table) {
            // Menambahkan kolom user_id dengan tipe unsignedBigInteger sebagai foreign key
            $table->unsignedBigInteger('user_id')->nullable();

            // Menambahkan foreign key constraint ke kolom user_id yang merujuk ke kolom id di tabel users
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact', function (Blueprint $table) {
            // Menghapus foreign key constraint jika migrasi di-rollback
            $table->dropForeign(['user_id']);

            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
}
