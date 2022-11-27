<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('code');
            $table->date('redemption_date');
            $table->bigInteger('member_id')->default(0);
            $table->bigInteger('voucher_id')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('membership_vouchers');
    }
}
