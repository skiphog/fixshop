<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->string('code');
            $table->string('slug', 500);
            $table->string('title');
            $table->string('nav');
            $table->string('standard')->nullable();
            $table->string('extra')->nullable();
            $table->string('img')->nullable();
            $table->string('description');
            $table->text('content');
            $table->json('breadcrumbs');
            $table->unsignedSmallInteger('sort')->default(0);
            $table->softDeletes();

            // Indexes
            $table->index('parent_id');
            $table->unique('code');
            $table->unique('slug');
            $table->index('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
