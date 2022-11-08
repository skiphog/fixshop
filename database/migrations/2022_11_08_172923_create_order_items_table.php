<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('order_items', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->string('title');
            $table->decimal('quantity', 15, 3);
            $table->enum('unit', ['шт', 'тыс. шт', 'кг', 'упак', 'набор', 'м', 'пар', 'рул', 'компл']);
            $table->decimal('price', 15, 2, true);
            $table->decimal('amount', 15, 2, true);

            // Indexes
            $table->foreign('order_id')
                ->references('id')
                ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
