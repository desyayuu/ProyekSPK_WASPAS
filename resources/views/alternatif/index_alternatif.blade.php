@extends('layouts.app')
@section('content')

<div class="row">
    <div class="flex flex-col col-lg-6 margin-tb m-6">
        <div class="pull-left mx-4 py-2">
            <p class="text-2xl font-bold">DATA ALTERNATIF</p>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Modal toggle -->

<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 relative overflow-x-auto shadow-md sm:rounded-lg mx-4 my-4" type="button">
    Tambah Alternatif
  </button>
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Tambah Alternatif
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
              <form class="p-4 md:p-5" method="post" action="{{route('alternatif.store')}}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="nama_alternatif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Alternatif</label>
                          <input type="text" name="nama_alternatif" id="nama_alternatif" aria-describedby="nama_alternatif" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Nama Alternatif" required="">
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

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-4">
    <button onclick="confirmReset()" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Reset
    </button>
    <form method="post" action="{{ route('alternatif.reset') }}" id="resetForm" style="display:none;">
        @csrf
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Alternatif
                </th>
                <th scope="col" class="px-3 py-2">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($alternatif as $Alternatif)
        <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $Alternatif->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $Alternatif->nama_alternatif }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                      <button data-modal-target="crud-modal-{{ $Alternatif->id }}" data-modal-toggle="crud-modal-{{ $Alternatif->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Edit
                      </button>
                      <!-- Main modal -->
                      <div id="crud-modal-{{ $Alternatif->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative p-4 w-full max-w-md max-h-full">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                  <!-- Modal header -->
                                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                          Edit Alternatif
                                      </h3>
                                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $Alternatif->id }}">
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
                                  <form class="p-4 md:p-5" method="post" action="{{route('alternatif.update', $Alternatif->id)}}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                          <div class="col-span-2">
                                              <label for="nama_alternatif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Alternatif</label>
                                              <input type="text" name="nama_alternatif" id="nama_alternatif" aria-describedby="nama_alternatif" value="{{$Alternatif->nama_alternatif}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Nama Alternatif" required="">
                                          </div>
                                      </div>
                                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                          Simpan Perubahan
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>


                    <form method="post" action="{{ route('alternatif.destroy', $Alternatif->id) }}" id="deleteForm" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="sumbit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onclick="confirmDelete({{$Alternatif->id}})">
                            Delete
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="d-flex">
        {{ $alternatif->links() }}
    </div>
</div>
<script>
    function confirmDelete(alternatifId) {
        var result = confirm("Apakah Anda yakin ingin menghapus data?");
        if (result) {
            // User clicked "OK," submit the form
            document.getElementById('deleteForm' + alternatifId).submit();
        } else {
            // User clicked "Cancel," do nothing
        }
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
