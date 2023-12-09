@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="flex flex-col col-lg-6 margin-tb m-6">
                <div class="pull-left mx-4 py-2">
                    <p class="text-2xl font-bold"> Edit Decision Matrix - {{ $alternatif->nama_alternatif }}
                </div>
            </div>
        </div>
        {{-- <h1>Edit Decision Matrix - {{ $alternatif->nama_alternatif }}</h1> --}}

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="max-w-sm mx-auto" method="post" action="{{ route('decision-matrix.update', $alternatif->id) }}">
            @csrf
            @method('PUT')
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 rounded-s-lg" >
                                Kriteria
                            </th>
                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                Nilai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $kriteriaItem)
                            <tr class="bg-white dark:bg-white">
                                <td class="px-9 py-2 font-medium text-gray-900 dark:text-gray-900">
                                    {{ $kriteriaItem->nama_kriteria }}
                                </td>
                                <td class="px-9 py-2 font-medium text-gray-900 dark:text-gray-900">
                                    <input type="text" name="value[{{ $kriteriaItem->id }}]" 
                                    value="{{ $matrixTable[$kriteriaItem->id] ?? '' }}" 
                                    class="form-control border-none bg-white dark:bg-white text-gray-900 dark:text-gray-900">
                                </td>   
                            </tr>
                        @endforeach
                        <tr>
                            <td class="px-6 py-4">
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                
            </div>
            <br>
            
        </form>
    </div>
@endsection
