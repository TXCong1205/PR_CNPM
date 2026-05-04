<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table='khuyen_mais';
    protected $fillable = [
        'id_nha_hang',
        'tieu_de',
        'mo_ta',
        'anh_banner',
        'loai_khuyen_mai',
        'phan_tram_giam',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
        'ngay_tao'
    ];
}
