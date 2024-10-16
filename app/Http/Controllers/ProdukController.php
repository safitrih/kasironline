<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produks = Produk::all();
        return response()->json($produks);
    }

    // Menambah produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'nullable|string',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        return response()->json(['message' => 'Produk berhasil ditambahkan', 'produk' => $produk], 201);
    }

    // Menampilkan produk berdasarkan ID
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'nullable|string',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return response()->json(['message' => 'Produk berhasil diperbarui', 'produk' => $produk]);
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}