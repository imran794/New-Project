<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('party_name')->nullable();
            $table->string('party_code')->nullable();
            $table->string('party_address')->nullable();
            $table->bigInteger('party_number')->unique();
            $table->bigInteger('party_alternate_number')->nullable();
            $table->bigInteger('party_credit_limit')->nullable();
            $table->string('party_type')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
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
        Schema::dropIfExists('parties');
    }
}
