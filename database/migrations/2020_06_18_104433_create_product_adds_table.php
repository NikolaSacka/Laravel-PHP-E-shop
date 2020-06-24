<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_adds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Majica');
            $table->string('description')->nullable();
            $table->string('path')->default('images/');
            $table->string('price')->default(1200);
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
        Schema::dropIfExists('product_adds');
    }
}
