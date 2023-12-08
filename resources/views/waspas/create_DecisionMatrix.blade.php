@extends('layouts.app')

@section('content')

<div class="row">
    <div class="flex flex-col col-lg-6 margin-tb m-6">
        <div class="pull-left mx-4 py-2">
            <p class="text-2xl font-bold"> DECISION MATRIKS</p>
        </div>
    </div>
</div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg" >
                    Nama Alternatif 
                </th>
                @foreach($kriteria as $KriteriaItem)
                
                <th scope="col" class="px-6 py-3 text-center">
                    {{$KriteriaItem->nama_kriteria}}
                </th>
                
                @endforeach
                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($alternatif as $alternatifItem)
        @if (!$alternatifItem->isUsed())
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $alternatifItem->nama_alternatif }}
                </th>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form class="max-w-sm mx-auto" method="post" action="{{ route('decision-matrix.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                    @foreach ($kriteria as $kriteriaItem)
                    <td class="px-6 py-4 ">
                        <div>
                            <input type="text" name="value_{{ $alternatifItem->id }}_{{ $kriteriaItem->id }}" size="5"/>
                        </div>
                    </td>
                @endforeach
                <td class="px-6 py-4">
                    <button type="submit"
                        class="text-[#41403D] bg-[#E9E2D0] hover:bg-[#BEBAAE] focus:ring-2 focus:ring-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Submit</button>
                </td>
                </form>
            </tr>
        @endif
    @endforeach
    </table>
</div>
    </div>
@endsection

