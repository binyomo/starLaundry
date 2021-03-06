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
            $table->string('code');
            $table->string('customer');
            $table->date('ambil');
            $table->boolean('payment');
            $table->foreignId('member_id');
            $table->foreignId('discount_id');
            $table->foreignId('outlet_id');
            $table->integer('status');
            $table->text('note')->nullable();
            $table->integer('total');
            $table->integer('grandTotal');
            $table->timestamps();
            $table->string('payment_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
