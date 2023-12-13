@extends('layouts.app')

@section('content')

<div class="row">
    <div class="flex flex-col col-lg-6 margin-tb m-6">
        <div class="pull-left">
            <p class="text-2xl font-bold">DECISION MATRIX</p>
        </div>

@if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="relative overflow-x-auto pt-4">
    <table class="w-10text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg" >
                    Nama Alternatif 
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif as $alternatifItem)
            @if (!$alternatifItem->isUsed())
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $alternatifItem->nama_alternatif }}
                </th>
                <td class="px-6 py-4">
                    

<!-- Modal toggle -->
<button data-modal-target="crud-modal-{{ $alternatifItem->id }}" data-modal-toggle="crud-modal-{{ $alternatifItem->id }}" class="block text-white bg-first
     hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-first
     dark:focus:ring-blue-800" type="button">
    Input Nilai 
</button>
  <!-- Main modal -->
  <div id="crud-modal-{{ $alternatifItem->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Input Nilai {{$alternatifItem->nama_alternatif}}
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $alternatifItem->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" method="post" action="{{ route('decision-matrix.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    @foreach ($kriteria as $kriteriaItem)
                        @if (!$alternatifItem->isUsed())
                            <div class="col-span-1">
                                <label for="kriteria_{{ $kriteriaItem->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $kriteriaItem->nama_kriteria }}</label>
                                <input type="text" name="value_{{ $alternatifItem->id }}_{{ $kriteriaItem->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            </div>
                        @endif
                    @endforeach
                </div>
                  
                  <button type="submit" class="text-white inline-flex items-center bg-first
                   hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-first
                   dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Submit
                  </button>
              </form>
          </div>
      </div>
  </div> 
  
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection

