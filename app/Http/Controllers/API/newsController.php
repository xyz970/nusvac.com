<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function add(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|int',
            'title' => 'required',
            'date' => 'required|date',
            'body' => 'required',
        ]);

        if ($validate) {
            News::create($validate);
            return response()->json(['message' => 'berhasil']);
        }

        return response()->json(['message' => 'gagal']);
    }

    public function index(Request $request)
    {
        $berita = News::all();
        return response()->json(['data' => $berita]);
    }

    public function delete($id)
    {
        $berita = News::find($id);
        $berita->delete();
        return response()->json(['message' => 'berhasil']);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id' => 'required|int',
            'title' => 'required',
            'date' => 'required|date',
            'body' => 'required',
        ]);
        if ($validate) {
            $berita = News::find($id);
            $berita->update($validate);
            $berita->save();
            return response()->json(['message' => 'berhasil']);
        }
        return response()->json(['message' => 'berhasil']);
    }
}
