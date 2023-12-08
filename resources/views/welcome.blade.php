@extends('layouts.app')
@section('content')



<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-4xl font-bold text-gray-800 dark:text-white">Welcome</h5>
    <p class="mt-3 text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify ">
        <b class="text-blue-500 sm:text-lg">Metode Weighted Aggregated Sum Product Assessment (WASPAS)</b>
        <br>
        Sebuah metode untuk mencari prioritas pilihan lokasi yang paling sesuai dengan menggunakan pembobotan.
Penerapan metode WASPAS yang merupakan kombinasi unik dua sumur dikenal sebagai MCDMapproaches, WMM dan
model produk berat (WPM) pada awalnya memerlukan normalisasi linier dari elemen hasil. Dengan metode WASPAS,
kriteria kombinasi optimum dicari berdasarkan dua kriteria optimum. Kriteria pertama yang optimal, kriteria keberhasilan
rata-rata tertimbang sama dengan metode WSM. Ini adalah pendekatan yang popular dan diadopsi untuk MCDM untuk
mengevaluasi beberapa alternative dalam beberapa kriteria keputusan.
    </p>
</div>
<div class="p-3 mt-3 rounded border  w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <iframe src="{{asset('assets/jurnal/jurnal_referensi.pdf')}}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
</div>



@endsection

