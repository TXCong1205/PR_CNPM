<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonHangRequest;
use App\Http\Requests\DonHangUpdateRequest;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDonHang()
    {
        $donHang = DonHang::all();
        return response()->json([
            'status' => 1,
            'data'   => $donHang
        ], 200);
    }

    public function postDonHang(DonHangRequest $request)
    {
        $donHang = DonHang::create([
            'id_khach_hang'             => $request->id_khach_hang,
            'id_nha_hang'               => $request->id_nha_hang,
            'id_shipper'                => $request->id_shipper,
            'id_dia_chi'                => $request->id_dia_chi,
            'id_khu_vuc_giao_hang'      => $request->id_khu_vuc_giao_hang,
            'id_coupon'                 => $request->id_coupon,
            'trang_thai'                => $request->trang_thai ?? 0,
            'tong_tien_hang'            => $request->tong_tien_hang,
            'phi_giao_hang'             => $request->phi_giao_hang,
            'tien_giam_gia'             => $request->tien_giam_gia,
            'tong_thanh_toan'           => $request->tong_thanh_toan,
            'ghi_chu'                   => $request->ghi_chu,
            'thoi_gian_du_kien_giao'    => $request->thoi_gian_du_kien_giao,
            'phuong_thuc_thanh_toan'    => $request->phuong_thuc_thanh_toan ?? 0,
        ]);
        return response()->json([
            'status'  => 1,
            'data'    => $donHang,
            'message' => 'Tạo đơn hàng thành công'
        ], 200);
    }

    public function putDonHang(DonHangUpdateRequest $request)
    {
        $donHang = DonHang::where('id', $request->id)
            ->update([
                'id_khach_hang'             => $request->id_khach_hang,
                'id_nha_hang'               => $request->id_nha_hang,
                'id_shipper'                => $request->id_shipper,
                'id_dia_chi'                => $request->id_dia_chi,
                'id_khu_vuc_giao_hang'      => $request->id_khu_vuc_giao_hang,
                'id_coupon'                 => $request->id_coupon,
                'trang_thai'                => $request->trang_thai,
                'tong_tien_hang'            => $request->tong_tien_hang,
                'phi_giao_hang'             => $request->phi_giao_hang,
                'tien_giam_gia'             => $request->tien_giam_gia,
                'tong_thanh_toan'           => $request->tong_thanh_toan,
                'ghi_chu'                   => $request->ghi_chu,
                'thoi_gian_du_kien_giao'    => $request->thoi_gian_du_kien_giao,
                'phuong_thuc_thanh_toan'    => $request->phuong_thuc_thanh_toan,
            ]);
        return response()->json([
            'status'  => 1,
            'data'    => $donHang,
            'message' => 'Cập nhật đơn hàng thành công'
        ], 200);
    }

    public function deleteDonHang(Request $request, $id)
    {
        $donHang = DonHang::find($id);
        if (!$donHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đơn hàng'
            ], 404);
        }
        $donHang->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa đơn hàng thành công'
        ], 200);
    }

    public function changesStatus(Request $request)
    {
        $donHang = DonHang::find($request->id);
        if (!$donHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đơn hàng'
            ], 404);
        }
        $donHang->trang_thai = $request->trang_thai;
        $donHang->save();
        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật trạng thái đơn hàng thành công'
        ], 200);
    }
}
