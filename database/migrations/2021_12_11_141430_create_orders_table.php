<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->integer('id_user')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('resi');
            $table->string('street');
            $table->string('street_no')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('postal_code');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('received_date')->nullable();
            $table->string('received_image')->nullable();
            $table->string('status')->nullable(); //inactive, process, done
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
        Schema::dropIfExists('orders');
    }
}
