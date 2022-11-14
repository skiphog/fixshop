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
        Schema::create('orders', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->unsignedInteger('quantity');
            $table->decimal('weight', 15, 3, true);
            $table->decimal('amount', 15, 2, true);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('organization')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', ['new', 'pending', 'completed', 'canceled'])->default('new');
            $table->timestamps();

            // Indexes
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
