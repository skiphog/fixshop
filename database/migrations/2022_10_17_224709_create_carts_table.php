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
        Schema::create('carts', static function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->uuid('cookie_id')->comment('ID корзины');
            $table->unsignedInteger('quantity')->default(0)->comment('Количество');
            $table->decimal('weight', 15, 3, true)->default(0)->comment('Вес');
            $table->decimal('amount', 15, 2, true)->default(0)->comment('Сумма');
            $table->timestamp('created_at')->useCurrentOnUpdate()->comment('Создание');

            // Indexes
            $table->unique('cookie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
