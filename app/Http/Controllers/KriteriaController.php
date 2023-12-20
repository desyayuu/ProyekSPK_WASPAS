<?php

namespace App\Http\Controllers;

use App\Models\DecisionMatrix;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $kriteria = Kriteria::orderBy('id', 'asc')->paginate(10);
    //     return view('kriteria.index_kriteria', compact('kriteria'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function index()
{
    $kriteria = Kriteria::orderBy('id', 'asc')->paginate(5);

    // Calculate the total weight of criteria
    $totalBobot = Kriteria::sum('bobot_kriteria');

    return view('kriteria.index_kriteria', compact('kriteria', 'totalBobot'))->with('i', (request()->input('page', 1) - 1) * 5);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria.index_kriteria');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kriteria' => 'required',
    //         'bobot_kriteria' => 'required',
    //         'jenis_kriteria' => 'required|in:cost,benefit',
    //         ]);
    //         Kriteria::create($request->all());

    //         return redirect()->route('kriteria.index')->with('success', 'Kriteria Berhasil Ditambahkan');

            
    // }
    public function store(Request $request)
{
    $request->validate([
        'nama_kriteria' => 'required',
        'bobot_kriteria' => 'required|numeric',
        'jenis_kriteria' => 'required|in:cost,benefit',
    ]);

    // Validasi tambahan untuk memastikan total bobot tidak melebihi 1
    $totalBobot = Kriteria::sum('bobot_kriteria') + $request->input('bobot_kriteria');
    if ($totalBobot <= 1) {
        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria Berhasil Ditambahkan');
    } 
    else {
        return redirect()->route('kriteria.index')->with('error', 'Total Bobot Kriteria melebihi 1. Tidak dapat menambah kriteria baru.');
    }
}


    /**
     * Display the specified resource.
     */
    // public function show(Kriteria $kriteria)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.index_kriteria', compact('kriteria'));

        $totalBobot = Kriteria::sum('bobot_kriteria') + $request->input('bobot_kriteria');
    if ($totalBobot <= 1) {
        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria Berhasil Ditambahkan');
    } 
    else {
        return redirect()->route('kriteria.index')->with('error', 'Total Bobot Kriteria melebihi 1. Tidak dapat menambah kriteria baru.');
    }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'jenis_kriteria' => 'required|in:cost,benefit',
            ]);
            
            $kriteria = Kriteria::where('id', $id)->first();
            $kriteria->nama_kriteria = $request->get('nama_kriteria');
            $kriteria->bobot_kriteria = $request->get('bobot_kriteria');
            $kriteria->jenis_kriteria = $request->get('jenis_kriteria');

            $kriteria->save();
            return redirect()->route('kriteria.index')
            -> with('success', 'Data Kriteria Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        return redirect()->route('kriteria.index') -> with('success', 'Data Kriteria Berhasil Dihapus');
    }
    public function reset()
    {
        // Nonaktifkan sementara foreign key constraints
        DB::statement('SET foreign_key_checks = 0;');

        // Hapus data dari tabel anak (decision_matrix) jika ada
        DecisionMatrix::truncate();

        // Melakukan TRUNCATE TABLE pada tabel kriteria
        Kriteria::truncate();

        // Mengaktifkan kembali foreign key constraints
        DB::statement('SET foreign_key_checks = 1;');

        // Setelah mereset, Anda dapat mengarahkan pengguna ke halaman yang sesuai
        return redirect()->route('kriteria.index')->with('success', 'Data Kriteria berhasil direset');
    }

}
