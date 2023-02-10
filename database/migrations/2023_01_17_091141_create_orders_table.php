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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');

            $table->unsignedBigInteger('good_id');
            $table->index('good_id', 'good_idx');
            $table->foreign('good_id', 'good_fk')->on('goods')->references('id');

            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('percent_discount')->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->index('customer_id', 'customer_idx');
            $table->foreign('customer_id', 'customer_fk')->on('customers')->references('id');

            $table->unsignedInteger('type_payment_id')->default(1);
            $table->text('addition')->nullable();

            $table->boolean('called')->default(false);
            $table->boolean('sent')->default(false);
            $table->boolean('returned')->default(false);
            $table->boolean('money_received')->default(false);

            $table->string('reason_for_not_sending')->nullable();
            $table->string('reason_for_return')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
};
