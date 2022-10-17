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
        Schema::create('cart_items', static function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('cart_id')->comment('ID Корзины');
            $table->foreignId('product_id')->comment('ID Товара');
            $table->unsignedInteger('quantity')->default(0)->comment('Количество');
            $table->decimal('weight', 15, 3, true)->default(0)->comment('Вес');
            $table->decimal('amount', 15, 2, true)->default(0)->comment('Сумма');
            $table->timestamp('created_at')->useCurrentOnUpdate()->comment('Создание');

            // Indexes
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
