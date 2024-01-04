<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()
    {
        $data ['barangs'] = Barang::all();
        return view('barang.index',$data);
    }

    public function create()
    {
        $jenisBarangs = JenisBarang::all();
        return view('barang.create', compact('jenisBarangs'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_barang' => 'required|max:255',
        'jenis_barang_id' => 'required|max:150',
        'harga' => 'required|numeric',
   
        'cover' => 'nullable|image',
        ]);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
            'public/cover_barang',
            'cover_barang_'.time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }

        Barang::create($validated);
        $notification = array(
            'message' => 'Data Barang berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if($request->save == true) {
            return redirect()->route('barang')->with($notification);
        } else {
        return redirect()->route('barang.create')->with($notification);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        $notification = array(
            'message' => 'Data barang berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('barang')->with($notification);
    }
    public function edit($id)
    {
        $barang = Barang::find($id);
        $jenisBarangs = JenisBarang::all();
    
        return view('barang.edit', compact('barang', 'jenisBarangs'));
    }

    public function update(Request $request, string $id)
    {
        $barang = Barang::find($id);
        $validated = $request->validate([
            'nama_barang' => 'required|max:255',
            'jenis_barang_id' => 'required|max:150',
            'harga' => 'required|numeric',
            'cover' => 'nullable|image',
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->storeAs(
                'public/cover_barang',
                'cover_barang_' . time() . '.' . $request->file('cover')->extension()
            );
            $validated['cover'] = basename($path);
        }

        $barang->update($validated);
        
        $notification = [
            'message' => 'Data barang berhasil diperbaharui',
            'alert-type' => 'success'
        ];

        return redirect()->route('barang')->with($notification);
    }
}
