<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer("user_id");
            $table->double("order_total");
            $table->string("receiverName");
            $table->string("receiverPhone");
            $table->string("receiverAddress");
            $table->string("receiverNote")->nullable();
            $table->timestamp('created_at')->useCurrent();

            // $table->timestamp('date');
            // $table->double('payment_cost');
            // $table->double('product_cost');
            // $table->double('shipping_cost');
            // $table->double('total');
            // $table->longText('shipping_address');
            // $table->enum('order_status', ['pending', 'completed', 'shipped', 'cancelled']);
            // $table->integer('user_id');
            // $table->integer('delivery_id');
            // $table->integer('payment_id');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
