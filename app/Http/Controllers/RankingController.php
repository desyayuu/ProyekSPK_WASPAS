<?php

namespace App\Http\Controllers;
use App\Http\Controllers\NormalisasiController;
use App\Models\Kriteria;
use App\Models\DecisionMatrix;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    private $normalisasiController;
    

    public function __construct(NormalisasiController $normalisasiController)
    {
        $this->normalisasiController = $normalisasiController;
    }

    public function index()
{
    $normalisasiValues = $this->normalisasiController->index()->getData();

    // Check if $normalisasiValues is an array and has the 'normalisasiTable' key
    if (!is_array($normalisasiValues) || !isset($normalisasiValues['normalisasiTable'])) {
        return view('waspas.index_Ranking')->with('error', 'Tidak ada data Normalisasi yang tersedia.');
    }

    $normalisasiTable = $normalisasiValues['normalisasiTable'];

    // Continue with your logic
    $kriteria = Kriteria::all();
    $waspasScores = [];

    foreach ($normalisasiTable as $idAlternatif => $values) {
        $weightedSum = 0;
        $weightedProduct = 1;

        foreach ($values as $idKriteria => $value) {
            $bobot = $kriteria->where('id', $idKriteria)->first()->bobot_kriteria;
            $weightedSum += $value * $bobot;
            $weightedProduct *= pow($value, $bobot);
        }

        $score = 0.5 * $weightedSum + 0.5 * $weightedProduct;
        $waspasScores[$idAlternatif] = number_format($score, 3);
    }

    arsort($waspasScores);

    $ranking = array_keys($waspasScores);

    $alternatifNames = Alternatif::pluck('nama_alternatif', 'id')->toArray();

    return view('waspas.index_Ranking', compact('waspasScores', 'ranking', 'alternatifNames'));
}
}
