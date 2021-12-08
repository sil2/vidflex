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
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->enum('financial_status', array(
                'unpaid',
                'voided',
                'pending',
                'refunded',
                'authorized',
                'partially_paid',
                'partially_refunded'
            ))->nullable()->default('unpaid')->index();
            $table->float('subtotal_price')->nullable();
            $table->float('total_tax')->nullable();
            $table->float('total_discounts')->nullable();
            $table->boolean('is_draft')->nullable()->index();
            $table->boolean('buyer_accepts_marketing')->nullable()->index();
            $table->boolean('taxes_included')->nullable()->index();
            $table->dateTime('closed_at')->nullable()->index();
            $table->dateTime('processed_at')->nullable()->index();
            $table->dateTime('cancelled_at')->nullable()->index();
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
