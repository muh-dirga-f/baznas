<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\Pembayaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $data = Pembayaran::orderBy('id', 'DESC')->has('konfirmasi', 'status')->get();
        // dd($data);
        if (request()->ajax()) {
            return datatables()->of($data)->make(true);
        }
        return view('admin.konfirmasi', [
            'title' => 'Konfirmasi',
            'active' => 'konfirmasi',
        ]);
    }

    public function statusReject()
    {

        $data = Pembayaran::orderBy('id', 'DESC')->whereHas('konfirmasi', function ($q) {
            $q->where('status', '=', 'reject');
        })->with('konfirmasi')->get();
        // dd($data);
        if (request()->ajax()) {
            return datatables()->of($data)->make(true);
        }
    }
    public function statusConfirm()
    {

        $data = Pembayaran::orderBy('id', 'DESC')->whereHas('konfirmasi', function ($q) {
            $q->where('status', '=', 'confirm');
        })->with('konfirmasi')->get();
        // dd($data);
        if (request()->ajax()) {
            return datatables()->of($data)->make(true);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Konfirmasi();
        $data->pembayaran_id = $request->pembayaran_id;
        $data->status = $request->status;
        $simpan = $data->save();
        if ($simpan) {
            return response()->json(['data' => $data, 'text' => 'data berhasi disimpan'], 200);
        } else {
            return response()->json(['data' => $data, 'text' => 'data gagal disimpan']);
        }
    }

    // public function edit(Request $request)
    // {
    //     $id = $request->id;
    //     $data = Konfirmasi::find($id);
    //     return response()->json(['data' => $data]);
    // }

    // public function update(Request $request)
    // {
    //     // dd($request->all());
    //     $id = $request->data_id;
    //     $datas = [
    //         'category_id' => $request->category_id,
    //         'user_id' => auth()->user()->id,
    //         'title' => $request->title,
    //         'slug' => $request->slug,
    //         'excerpt' => Str::limit(strip_tags($request->body), 15),
    //         'body' => $request->body,
    //     ];
    //     $data = Konfirmasi::find($id);
    //     $simpan = $data->update($datas);
    //     if ($simpan) {
    //         return response()->json(['text' => 'berhasil diubah'], 200);
    //     } else {
    //         return response()->json(['text' => 'Gagal diubah'], 422);
    //     }
    // }

    // public function delete(Request $request)
    // {
    //     $id = $request->id;
    //     $data = Konfirmasi::find($id);
    //     $data->delete();
    //     return response()->json(['text' => 'berhasil dihapus'], 200);
    // }
}
