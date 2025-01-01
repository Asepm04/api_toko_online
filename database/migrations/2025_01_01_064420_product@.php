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
        Schema::create('Product2', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('name_product');
            $table->string('stock');
            $table->string('price');
            $table->string('image');
            $table->unsignedBigInteger("user_id")->nullable(false);
            $table->timestamp('failed_at')->useCurrent();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product2');

    }
};
