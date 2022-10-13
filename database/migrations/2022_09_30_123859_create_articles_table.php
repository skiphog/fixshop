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
        Schema::create('articles', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rubric_id');
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->string('title');
            $table->string('img')->default('/img/no_image.png');
            $table->string('intro', 500)->default('');
            $table->text('content');
            $table->unsignedTinyInteger('time_to_read')->default(0);
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->foreign('rubric_id')
                ->references('id')
                ->on('rubrics');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('articles');
    }
};
