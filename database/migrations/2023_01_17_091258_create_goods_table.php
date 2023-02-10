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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_main');
            $table->string('image_0')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();
            $table->string('image_7')->nullable();
            $table->string('image_8')->nullable();
            $table->unsignedBigInteger('quantity_in_stoke')->default(0);
            $table->unsignedBigInteger('price')->default(0);
            $table->boolean('on_off')->default(true);
            $table->string('youtube')->nullable();
            $table->unsignedBigInteger('up_down')->default(100);
            $table->unsignedBigInteger('number_of_sales')->default(0);
            $table->unsignedBigInteger('number_of_returns')->default(0);
            $table->unsignedBigInteger('number_of_views')->default(0);
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
        Schema::dropIfExists('goods');
    }
};
