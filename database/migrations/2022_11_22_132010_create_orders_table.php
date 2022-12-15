<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ordername');
            $table->string('orderlname');
            $table->string('ordercountry');
            $table->string('ordercity');
            $table->string('orderpost');
            $table->string('orderaddress1');
            $table->string('orderddress2');
            $table->string('orderphone');
            $table->string('orderemail');
            $table->string('ordercompany');
            $table->string('orderstaus');
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
        Schema::dropIfExists('orders');
    }
}
