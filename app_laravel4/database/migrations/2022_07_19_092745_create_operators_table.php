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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nip')->unique('operators', 'nip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jabatan');
            $table->string('grade');
            $table->enum('shift', ['E', 'F', 'G', 'H']);
            $table->string('supervisor');
            $table->longText('foto')->default('avatar');
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
        Schema::dropIfExists('operators');
    }
};
