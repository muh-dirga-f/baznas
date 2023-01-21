<?php

namespace App\Http\Controllers;

use App\Models\Pencairan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
  public function index()
  {

    $data = Pencairan::orderBy('id', 'DESC')->get();
    if (request()->ajax()) {
      return datatables()->of($data)->make(true);
    }
    return view('admin.pencairan', [
      'title' => 'Pencairan',
      'active' => 'pencairan',
    ]);
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $data = new Pencairan();
    $data->jumlah_dana = $request->jumlah_dana;
    $data->nama_bank = $request->nama_bank;
    $data->no_rek_bank = $request->no_rek_bank;
    $data->nama_rek_bank = $request->nama_rek_bank;
    $data->rencana_penggunaan = $request->rencana_penggunaan;
    $simpan = $data->save();
    if ($simpan) {
      return response()->json(['data' => $data, 'text' => 'data berhasi disimpan'], 200);
    } else {
      return response()->json(['data' => $data, 'text' => 'data gagal disimpan']);
    }
  }

  public function edit(Request $request)
  {
    $id = $request->id;
    $data = Pencairan::find($id);
    return response()->json(['data' => $data]);
  }

  public function update(Request $request)
  {
    // dd($request->all());
    $id = $request->data_id;
    $data = [
        'jumlah_dana' => $request->jumlah_dana,
        'nama_bank' => $request->nama_bank,
        'no_rek_bank' => $request->no_rek_bank,
        'nama_rek_bank' => $request->nama_rek_bank,
        'rencana_penggunaan' => $request->rencana_penggunaan,
    ];
    $update = Pencairan::find($id);
    $simpan = $update->update($data);
    if ($simpan) {
      return response()->json(['text' => 'berhasil diubah'], 200);
    } else {
      return response()->json(['text' => 'Gagal diubah'], 422);
    }
  }

  public function delete(Request $request)
  {
    $id = $request->id;
    $data = Pencairan::find($id);
    $data->delete();
    return response()->json(['text' => 'berhasil dihapus'], 200);
  }
}
