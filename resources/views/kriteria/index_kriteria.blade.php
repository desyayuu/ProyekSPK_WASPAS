@extends('layouts.app')
@section('content')

<div class="row">
    <div class="flex flex-col col-lg-6 margin-tb m-6">
        <div class="pull-left">
            <p class="text-2xl font-bold">DATA KRITERIA</p>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<!-- Modal toggle -->
<div class="flex items-center space-x-4">
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-first hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 relative overflow-x-auto shadow-md sm:rounded-lg mx-4 my-4" type="button">
    Tambah Kriteria
</button>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Kriteria
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="post" action="{{route('kriteria.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" id="nama_kriteria" aria-describedby="nama_kriteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Nama Kriteria" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="bobot_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot Kriteria</label>
                        <input type="bobot_kriteria" name="bobot_kriteria" id="bobot_kriteria" aria-describedby="bobot_kriteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jenis_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kriteria</label>
                        <select id="jenis_kriteria" name='jenis_kriteria' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Jenis Kriteria</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambahkan
                </button>
            </form>
        </div>
    </div>
</div>

    <button onclick="confirmReset()" class="text-white bg-fifth hover:bg-third-800 focus:ring-4 focus:outline-none focus:ring-third-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Reset
    </button>
    <form method="post" action="{{ route('kriteria.reset') }}" id="resetForm" style="display:none;">
        @csrf
    </form>
</div>
<div class="flex items-center space-x-4 ml-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kriteria
                </th>
                <th scope="col" class="px-6 py-3">
                    Bobot Kriteria
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis Kriteria
                </th>
                <th scope="col" class="px-6 py-2 rounded-e-lg">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($kriteria as $Kriteria)
        <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $Kriteria->id }}
                </th>
                <td class="px-6">
                    {{ $Kriteria->nama_kriteria }}
                </td>
                <td class="px-6">
                    {{ $Kriteria->bobot_kriteria }}
                </td>
                <td class="px-6">
                    {{ $Kriteria->jenis_kriteria }}
                </td>
                <td class="px-6 ">
                    <div class="flex items-center">
                      <button data-modal-target="crud-modal-{{ $Kriteria->id }}" data-modal-toggle="crud-modal-{{ $Kriteria->id }}" class="text-white bg-first hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button">
                        Edit
                      </button>
                      <!-- Main modal -->
                      <div id="crud-modal-{{ $Kriteria->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative p-4 w-full max-w-md max-h-full">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                  <!-- Modal header -->
                                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                          Edit Kriteria
                                      </h3>
                                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $Kriteria->id }}">
                                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                      </button>
                                  </div>

                                  @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                  <!-- Modal body -->
                                  <form class="p-4 md:p-5" method="post" action="{{route('kriteria.update', $Kriteria->id)}}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                          <div class="col-span-2">
                                              <label for="nama_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                                              <input type="text" name="nama_kriteria" id="nama_kriteria" aria-describedby="nama_kriteria" value="{{$Kriteria->nama_kriteria}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Nama Kriteria" required="">
                                          </div>
                                          <div class="col-span-2 sm:col-span-1">
                                              <label for="bobot_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot Kriteria</label>
                                              <input type="bobot_kriteria" name="bobot_kriteria" id="bobot_kriteria" aria-describedby="bobot_kriteria" value="{{$Kriteria->bobot_kriteria}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                                          </div>
                                          <div class="col-span-2 sm:col-span-1">
                                              <label for="jenis_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kriteria</label>
                                              <select id="jenis_kriteria" name='jenis_kriteria' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                  <option selected="">Pilih Jenis Kriteria</option>
                                                  <option value="benefit"  {{ $Kriteria->jenis_kriteria == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                                  <option value="cost"  {{ $Kriteria->jenis_kriteria == 'cost' ? 'selected' : '' }}>Cost</option>
                                              </select>
                                          </div>
                                      </div>
                                      <button type="submit" class="text-white inline-flex items-center bg-first hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                          Simpan Perubahan
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    <form method="post" action="{{ route('kriteria.destroy', $Kriteria->id) }}" id="deleteForm" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-fifth hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                        onclick="return confirmDelete({{ $Kriteria->id }})">
                            Delete
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
    <div class="d-flex">
        {{ $kriteria->links() }}
    </div>
    
</div>
<script>
    function confirmDelete(kriteriaId) {
        var result = window.confirm("Apakah Anda yakin ingin menghapus data?");
        if (result) {
            // User clicked "OK," submit the form
            document.getElementById('deleteForm-' + kriteriaId).submit();
        }
        // If the user clicked "Cancel," do nothing
        return false;
    }
</script>



<script>
    function confirmReset() {
        var result = confirm("Apakah Anda yakin ingin mereset semua data?");
        if (result) {
            // User clicked "OK," submit the form
            document.getElementById('resetForm').submit();
        } else {
            // User clicked "Cancel," do nothing
        }
    }
</script>
@endsection
