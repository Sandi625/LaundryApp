<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->biginteger('no_telp');
            $table->enum('servis',['cuci','setrika','laundry']);
            $table->string('keterangan');
            $table->integer('kg');
            $table->biginteger('biaya');
            $table->enum('status',['proses','selesai','diambil','antar']);
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
        Schema::dropIfExists('_employees');
    }
};
