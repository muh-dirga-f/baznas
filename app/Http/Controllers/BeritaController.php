<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {

        $data = Post::get();
        if (request()->ajax()) {
            return datatables()->of($data)->make(true);
        }
        return view('admin.berita', [
            'title' => 'Berita',
            'active' => 'berita',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = new Post();
        $data->category_id = $request->category_id;
        $data->user_id = auth()->user()->id;
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->excerpt = Str::limit(strip_tags($request->body), 15);
        $data->body = $request->body;
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
        $data = Post::find($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->data_id;
        $datas = [
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => strip_tags($request->body),
            'body' => $request->body,
        ];
        $data = Post::find($id);
        $simpan = $data->update($datas);
        if ($simpan) {
            return response()->json(['text' => 'berhasil diubah'], 200);
        } else {
            return response()->json(['text' => 'Gagal diubah'], 422);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Post::find($id);
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }
}
