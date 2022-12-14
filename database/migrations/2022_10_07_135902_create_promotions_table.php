<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('promotions', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->string('path');
            $table->string('title');
            $table->string('alt');
            $table->unsignedInteger('sort')->default(100);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();

            // Indexes
            $table->index('sort');
            $table->foreign('article_id')
                ->references('id')
                ->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('promotions');
    }
};
