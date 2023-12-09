@extends('layouts.app')

@section('content')
<div class="row">
    <div class="flex flex-col col-lg-6 margin-tb m-6">
        <div class="pull-left">
            <p class="text-2xl font-bold">RANKING</p>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto">
    @if(!empty($waspasScores))
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg" >
                    Ranking
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Alternatif
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    Score
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($ranking as $rank => $idAlternatif)
            <tr class="bg-white dark:bg-gray-800">
                
                    <th scope="row" class="px-6 py-3 rounded-s-lg">
                        {{$rank + 1}}
                    </th>
                    <td class="px-6">{{$alternatifNames[$idAlternatif]}}</td>
                    <td class="px-6">{{$waspasScores[$idAlternatif]}}</td>
                </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Danger alert!</span> Tidak Ada Decision Matrix yang tersimpan. Silahkan Isi Kriteria dan Alternatif Terlebih Dahulu. 
        </div>
    </div>
    @endif
</div>
@endsection
