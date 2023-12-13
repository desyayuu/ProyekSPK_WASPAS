@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="flex flex-col col-lg-6 margin-tb m-6">
                <div class="pull-left">
                    <p class="text-2xl font-bold">DECISION MATRIKS</p></p>
                </div>
            </div>
        </div>

        @if(!empty($matrixTable))
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Nama Alternatif 
                        </th>       
                        @foreach($kriteriaNames as $kriteriaId => $kriteriaName)
                        <th scope="col" class="px-6 py-3">
                            {{ $kriteriaName }}
                        @endforeach
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Action
                        </th>
                    </tr>
                </thead>
                @foreach($matrixTable as $alternatifId => $kriteriaValues)
                @php
                    $alternatifName = \App\Models\Alternatif::find($alternatifId)->nama_alternatif;
                @endphp
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-3 rounded-s-lg">
                            {{ \App\Models\Alternatif::find($alternatifId)->nama_alternatif }}
                        </th>
                        @foreach($kriteriaNames as $kriteriaId => $kriteriaName)
                        <td class="px-6">{{ $kriteriaValues[$kriteriaId] ?? '' }}</td>
                        @endforeach
                        <td class="px-6">
                            <div class="flex space-x-2">
                                <button href="{{ route('decision-matrix.edit', $alternatifId) }}" type="button"  onclick="window.location.href='{{ route('decision-matrix.edit', $alternatifId) }}'" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-first rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-first dark:focus:ring-blue-800">
                                    Edit
                                </button>
                                <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="confirmDelete({{ $alternatifId }})">
                                    Delete
                                </button>
                                <form id="deleteForm-{{ $alternatifId }}" method="post" action="{{ route('decision-matrix.destroy', $alternatifId) }}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
            @endforeach
            </table>
        </div>
        
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

    <script>
        function confirmDelete(alternatifId) {
            var result = window.confirm("Apakah Anda yakin ingin menghapus data?");
            if (result) {
                // User clicked "OK," submit the form
                document.getElementById('deleteForm-' + alternatifId).submit();
            }
            // If the user clicked "Cancel," do nothing
        }
    </script>
@endsection
