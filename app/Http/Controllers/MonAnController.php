<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonAnRequest;
use App\Http\Requests\MonAnUpdateRequest;
use App\Models\MonAn;
use Illuminate\Http\Request;

class MonAnController extends Controller
{
    public function getMonAn()
    {
        $monAn = MonAn::all();
        return response()->json([
            'status' => 1,
            'data'   => $monAn
        ], 200);
    }

    public function postMonAn(MonAnRequest $request)
    {
        $monAn = MonAn::create([
            'id_nha_hang'               => $request->id_nha_hang,
            'id_danh_muc'               => $request->id_danh_muc,
            'ten_mon_an'                => $request->ten_mon_an,
            'mo_ta'                     => $request->mo_ta,
            'hinh_anh'                  => $request->hinh_anh,
            'gia_ban'                   => $request->gia_ban,
            'gia_goc'                   => $request->gia_goc,
            'thoi_gian_chuan_bi_phut'   => $request->thoi_gian_chuan_bi_phut,
            'trang_thai'                => $request->trang_thai ?? 0,
        ]);
        return response()->json([
            'status'  => 1,
            'data'    => $monAn,
            'message' => 'Thêm món ăn thành công'
        ], 200);
    }

    public function putMonAn(MonAnUpdateRequest $request)
    {
        $monAn = MonAn::where('id', $request->id)
            ->update([
                'id_nha_hang'               => $request->id_nha_hang,
                'id_danh_muc'               => $request->id_danh_muc,
                'ten_mon_an'                => $request->ten_mon_an,
                'mo_ta'                     => $request->mo_ta,
                'hinh_anh'                  => $request->hinh_anh,
                'gia_ban'                   => $request->gia_ban,
                'gia_goc'                   => $request->gia_goc,
                'thoi_gian_chuan_bi_phut'   => $request->thoi_gian_chuan_bi_phut,
                'trang_thai'                => $request->trang_thai,
            ]);
        return response()->json([
            'status'  => 1,
            'data'    => $monAn,
            'message' => 'Cập nhật món ăn thành công'
        ], 200);
    }

    public function deleteMonAn(Request $request, $id)
    {
        $monAn = MonAn::find($id);
        if (!$monAn) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy món ăn'
            ], 404);
        }
        $monAn->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa món ăn thành công'
        ], 200);
    }

    public function changesStatus(Request $request)
    {
        $monAn = MonAn::find($request->id);
        if (!$monAn) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy món ăn'
            ], 404);
        }
        $monAn->trang_thai = $request->trang_thai;
        $monAn->save();
        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật trạng thái món ăn thành công'
        ], 200);
    }
}
