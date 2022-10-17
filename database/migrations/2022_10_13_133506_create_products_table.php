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
        Schema::create('products', static function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('category_id')->comment('ID категории');
            $table->string('title')->comment('Наименование');
            $table->string('img')->nullable()->comment('Картинка');
            $table->text('content')->nullable()->comment('Описание');
            $table->decimal('price', 15, 2, true)->default(0)->comment('Цена');
            $table->enum('unit',
                ['шт', 'тыс. шт', 'кг', 'упак', 'набор', 'м', 'пар', 'рул', 'компл'])->comment('Ед. изм.');
            $table->decimal('weight', 15, 3, true)->default(0)->comment('Вес');
            $table->decimal('quantity', 15, 3)->default(0)->comment('Количество');
            $table->unsignedInteger('packing')->default(0)->comment('Упаковка');
            $table->unsignedInteger('sort')->default(0)->comment('Сортировка');
            $table->timestamp('created_at')->nullable()->comment('Создание');
            $table->timestamp('updated_at')->nullable()->comment('Обновление');
            $table->softDeletes()->comment('Удаление');

            // Indexes
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->index(['category_id', 'sort']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
