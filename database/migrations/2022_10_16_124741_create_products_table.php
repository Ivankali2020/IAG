<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subCategory_id');
            $table->string('add_on');
            $table->text('highlight');
            $table->string('code');
            $table->string('ordering')->nullable();
            $table->text('ingredient')->nullable();
            $table->text('nutrient')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('min_order');
            $table->unsignedBigInteger('max_order');
            $table->string('unit_value');
            $table->string('unit');
            $table->string('tags');
            $table->longText('description');
            $table->enum('is_publish',[0,1])->default(0);
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
        Schema::dropIfExists('products');
    }
}
