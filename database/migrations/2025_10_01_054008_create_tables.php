<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone');
            $table->boolean('is_organization');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name', 256);
            $table->integer('price');
            $table->integer('balance');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->integer('total_price');
            $table->boolean('need_delivery');
        });

        Schema::create('item_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('is_organization');
        });
        Schema::dropIfExists('item_orders');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');
    }
};
