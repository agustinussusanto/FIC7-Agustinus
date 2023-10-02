<?php

use App\Models\Category;
use App\Models\User;
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
      // Mengecek apakah tabel sudah ada
if (!Schema::hasTable('products')) {
    // Membuat tabel 'products' jika belum ada
    Schema::create('products', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->text('description');
        $table->double('price');
        $table->string('image_url');
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        // Menambahkan foreign key constraints
        $table->foreign('category_id')->references('id')->on('categories');
        $table->foreign('user_id')->references('id')->on('users');
    });
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
