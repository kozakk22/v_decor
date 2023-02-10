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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name_manager')->nullable();
            $table->string('mail')->nullable();
            $table->string('phone')->nullable();
            $table->string('instagram')->nullable();
            $table->text('delivery_rules')->nullable();
            $table->text('payment_rules')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('name_shop')->nullable();

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
        Schema::dropIfExists('shops');
    }
};
