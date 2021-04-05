<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('voucher_id')->unsigned();
            $table->integer('point_redeem')->default(0);
            $table->dateTime('valid_until');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vouchers');
    }
}
