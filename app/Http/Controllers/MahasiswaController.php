<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.index', [
            'title' => 'Mahasiswa',
            'data' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create', [
            'title' => 'Create Mahasiswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:80',
            'nim' => 'required|integer|digits:10',
            'jurusan' => 'required',
            'angkatan' => 'required|max:4',
            'email' => 'required|email:rfc,dns'
        ]);

        Mahasiswa::create($data);
        return redirect('/')->with('Success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mahasiswa::findOrFail($id);
        return view('crud.show', [
            'title' => 'Show Mahasiswa ' . $data->name,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::findOrFail($id);
        return view('crud.edit', [
            'title' => 'Edit Mahasiswa ' . $data->nama,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'email' => $request->email
        ];

        Mahasiswa::where('id', $id)->update($data);
        return redirect('/')->with('Success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::destroy($id);
        return redirect('/')->with('Success', 'Data berhasil dihapus');
    }
}
