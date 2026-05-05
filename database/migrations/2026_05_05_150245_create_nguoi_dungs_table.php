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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('so_dien_thoai', 20)->nullable()->unique();
            $table->string('ho_ten', 150);
            $table->string('anh_dai_dien', 500)->nullable();
            $table->enum('vai_tro', ['khach_hang', 'shipper', 'quan_tri_vien'])->default('khach_hang');
            $table->boolean('dang_hoat_dong')->default(true);
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
