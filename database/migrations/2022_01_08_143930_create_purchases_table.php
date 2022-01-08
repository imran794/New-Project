<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->nullable();
            $table->bigInteger('work_order_id')->nullable();
            $table->bigInteger('supplier_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('file')->nullable();
            $table->string('purchase_no')->nullable();
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('total_amount',14,2)->nullable();
            $table->enum('patment_method',['Cash','Credit'])->default('Cash');
            $table->decimal('discount',10,2)->nullable();
            $table->decimal('carrying_cost',10,2)->nullable();
            $table->decimal('grand_total',10,2)->nullable();
            $table->decimal('previous_due',10,2)->nullable();
            $table->decimal('total_with_due',10,2)->nullable();
            $table->decimal('current_payment',10,2);
            $table->decimal('current_balance',10,2);
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->integer('lot_no')->nullable();
            $table->integer('sale_qty');
            $table->enum('deleted',['yes','no'])->default('no');
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
        Schema::dropIfExists('purchases');
    }
}
