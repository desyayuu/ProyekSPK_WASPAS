<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\DecisionMatrix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::orderBy('id', 'asc')->paginate(5);
        return view('alternatif.index_alternatif', compact('alternatif'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatif.index_alternatif');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            ]);
            Alternatif::create($request->all());

            return redirect()->route('alternatif.index')->with('success', 'Alternatif Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Alternatif $alternatif)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        return view('alternatif.index_alternatif', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            ]);

            $alternatif = Alternatif::where('id', $id)->first();
            $alternatif->nama_alternatif = $request->get('nama_alternatif');

            $alternatif->save();
            return redirect()->route('alternatif.index')
            -> with('success', 'Data Alternatif Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::find($id)->delete();
        return redirect()->route('alternatif.index') -> with('success', 'Data Alternatif Berhasil Dihapus');
    }

    public function reset()
    {
        // Nonaktifkan sementara foreign key constraints
        DB::statement('SET foreign_key_checks = 0;');

        // Hapus data dari tabel anak (decision_matrix) jika ada
        DecisionMatrix::truncate();

        // Melakukan TRUNCATE TABLE pada tabel alternatid
        Alternatif::truncate();

        // Mengaktifkan kembali foreign key constraints
        DB::statement('SET foreign_key_checks = 1;');

        // Setelah mereset, Anda dapat mengarahkan pengguna ke halaman yang sesuai
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil direset');
    }

}
