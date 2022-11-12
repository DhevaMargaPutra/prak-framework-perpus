<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_buku', function (Blueprint $table) {
            $table->integer('ID_Buku', true, true);
            $table->string('Judul', 100);
            $table->string('Pengarang', 150);
            $table->string('Kategori', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_buku');
    }
}
