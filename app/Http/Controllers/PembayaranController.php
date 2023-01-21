<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {

        $data = Pembayaran::orderBy('id', 'DESC')->get();
        if (request()->ajax()) {
            return datatables()->of($data)->make(true);
        }
        return view('admin.pembayaran', [
            'title' => 'Pembayaran',
            'active' => 'pembayaran',
        ]);
    }
    public function bayarZakat()
    {
        // $data = Pembayaran::get();
        // if (request()->ajax()) {
        //   return datatables()->of($data)->make(true);
        // }
        return view('bayarzakat', [
            'title' => 'Bayar Zakat',
            'active' => 'bayar',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Pembayaran();
        //Storage::delete('/public/avatars/'.$user->avatar);
        $filenameWithExt = $request->file('bukti_pembayaran')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('bukti_pembayaran')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload Image
        $request->file('bukti_pembayaran')->storeAs('public/pembayaran', $fileNameToStore);
        $data->zis = $request->zis;
        $data->jenis_zis = $request->jenis_zis;
        $data->sapaan = $request->sapaan;
        $data->nama_pengirim = $request->nama_pengirim;
        $data->no_pengirim = $request->no_pengirim;
        $data->email_pengirim = $request->email_pengirim;
        $data->nama_bank = $request->nama_bank;
        $data->nama_rek_bank = $request->nama_rek_bank;
        $data->no_rek_bank = $request->no_rek_bank;
        $data->nominal = $request->nominal;
        $data->bukti_pembayaran = $fileNameToStore;

        $simpan = $data->save();
        if ($simpan) {
            return redirect('/bayar-zakat')->with(['success' => 'Data Berhasil Disimpan!']);
            // return response()->json(['data' => $data, 'text' => 'data berhasi disimpan'], 200);
        } else {
            return redirect('/bayar-zakat')->with(['error' => 'Data Gagal Disimpan!']);
            // return response()->json(['data' => $data, 'text' => 'data gagal disimpan']);
        }
    }

    // public function edit(Request $request)
    // {
    //     $id = $request->id;
    //     $data = Pembayaran::find($id);
    //     return response()->json(['data' => $data]);
    // }

    //   public function update(Request $request)
    //   {
    //     // dd($request->all());
    //     $id = $request->data_id;
    //     $datas = [
    //       'category_id' => $request->category_id,
    //       'user_id' => auth()->user()->id,
    //       'title' => $request->title,
    //       'slug' => $request->slug,
    //       'excerpt' => Str::limit(strip_tags($request->body), 15),
    //       'body' => $request->body,
    //     ];
    //     $data = Pembayaran::find($id);
    //     $simpan = $data->update($datas);
    //     if ($simpan) {
    //       return response()->json(['text' => 'berhasil diubah'], 200);
    //     } else {
    //       return response()->json(['text' => 'Gagal diubah'], 422);
    //     }
    //   }

    //   public function delete(Request $request)
    //   {
    //     $id = $request->id;
    //     $data = Pembayaran::find($id);
    //     $data->delete();
    //     return response()->json(['text' => 'berhasil dihapus'], 200);
    //   }
}
