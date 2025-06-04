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
        Schema::table('tb_pelanggan1', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable()->after('id_pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pelanggan1', function (Blueprint $table) {
              $table->dropColumn('id_user');
        });
    }
};
