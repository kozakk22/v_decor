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
        Schema::create('good_subcategory', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('good_id');
            $table->unsignedBigInteger('subcategory_id');

            $table->index('good_id', 'subcategory_good_good_idx');
            $table->index('subcategory_id', 'subcategory_good_subcategory_idx');

            $table->foreign('good_id', 'subcategory_good_good_fk')->on('goods')->references('id');
            $table->foreign('subcategory_id', 'subcategory_good_subcategory_fk')->on('subcategories')->references('id');

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
        Schema::dropIfExists('good_subcategory');
    }
};
