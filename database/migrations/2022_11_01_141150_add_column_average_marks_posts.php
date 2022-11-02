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
        Schema::table('posts', function (Blueprint $table) {
            $table->float('avr_mark_complexity')->default(0);
            $table->float('avr_mark_creativity')->default(0);
            $table->float('avr_mark_innovativeness')->default(0);
            $table->float('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['avr_mark_complexity','avr_mark_creativity','avr_mark_innovativeness','rating']);
        });
    }
};
