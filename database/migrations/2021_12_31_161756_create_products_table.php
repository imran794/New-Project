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
            $table->string('product_name');
            $table->string('product_stock');
            $table->bigInteger('brand_id');
            $table->string('product_unit');
            $table->string('product_unit_price');
            $table->string('product_sell_qty')->default(0);
            $table->string('total')->nullable();
            $table->enum('deleted',['yes','no'])->default('no');
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->bigInteger('created_by');
            $table->datetime('created_date');
            $table->bigInteger('updated_by')->nullable();
            $table->datetime('updated_date')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->datetime('deleted_date')->nullable();
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
