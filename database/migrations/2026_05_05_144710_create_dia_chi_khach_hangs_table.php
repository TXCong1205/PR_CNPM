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
        Schema::create('dia_chi_khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang');
            $table->string('nhan');
            $table->string('dia_chi_day_du');
            $table->string('vi_do')->nullable();
            $table->string('kinh_do')->nullable();
            $table->boolean('la_mac_dinh')->default(false);
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_chi_khach_hangs');
    }
};
