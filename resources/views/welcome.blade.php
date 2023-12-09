@extends('layouts.app')
@section('content')



<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-4xl font-bold text-gray-800 dark:text-white">Welcome to WASPAS Calculator</h5>
    <p class="mt-3 text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify ">
       <h6>
        <b class="text-blue-500 sm:text-lg">Metode Weighted Aggregated Sum Product Assessment (WASPAS)</b>
       </h6>
       <p class="mt-3 text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify"> Sebuah metode untuk mencari prioritas pilihan lokasi yang paling sesuai dengan menggunakan pembobotan.
        Penerapan metode WASPAS yang merupakan kombinasi unik dua sumur dikenal sebagai MCDMapproaches, WMM dan
        model produk berat (WPM) pada awalnya memerlukan normalisasi linier dari elemen hasil. Dengan metode WASPAS,
        kriteria kombinasi optimum dicari berdasarkan dua kriteria optimum. Kriteria pertama yang optimal, kriteria keberhasilan
        rata-rata tertimbang sama dengan metode WSM. Ini adalah pendekatan yang popular dan diadopsi untuk MCDM untuk
        mengevaluasi beberapa alternative dalam beberapa kriteria keputusan. </p>
    </p>
</div>


<div class="w-full p-4 mt-3 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <p class="text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify ">
       <h6>
        <b class="text-blue-500 sm:text-lg">Flowchart Metode WASPAS</b>
       </h6>
       <p class="mt-3">
        <img src="assets\image\flowchart waspas1.png" alt="" class="mt-3 max-w-full mx-auto w-32">
       </p>
    </p>
</div>

<div class="w-full p-4 mt-3 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <p class="text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify ">
        <h6>
            <b class="text-blue-500 sm:text-lg">Langkah-Langkah Metode WASPAS</b>
        </h6>
        <div class="text-base text-gray-500 sm:text-base dark:text-gray-400 text-justify">
            <ul class="p-3 list-decimal">
                <li>Pembuatan matriks</li>
                <div class="w-full sm:w-auto bg-blue-500  text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 mb-3 mt-2">
                    <div class="my-1">
                        <img src="assets\image\matrix.jpeg" alt="" class="w-64 h-auto">
                    </div>
                    </div>
                <li>Menormalisasi Nilai <b>Rij </b>dengan rumus sebagai berikut:</li>
               <div class=" my-3 space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="#" class="w-full sm:w-auto bg-blue-500  text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">

                    <div class="text-left rtl:text-right">
                        <div class="text-left rtl:text-right">
                            <div class="-mt-1 font-sans text-sm font-semibold text-center">Kriteria Benefit</div>
                        </div>
                        <div class="mt-2">
                            <img src="assets\image\benefit.jpeg" alt="" class="w-28 h-auto">
                        </div>
                        </div>
                </a>

        <a href="#" class="w-full sm:w-auto bg-blue-500  text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">

            <div class="text-left rtl:text-right">
                <div class="text-left rtl:text-right">
                    <div class="-mt-1 font-sans text-sm font-semibold text-center">Kriteria Cost</div>
                </div>
                <div class="mt-2">
                    <img src="assets\image\cost.jpeg" alt="" class="w-28 h-auto">
                </div>
                </div>
        </a>
    </div>
                <li class="mt-3">Menghitung data <b>nilai alternatif (Qi) </b> dengan menggunakan rumus berikut:</li>
                <div class="w-full sm:w-auto bg-blue-500  text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 my-2">
                    <div class="my-1">
                        <img src="assets\image\Qi.jpeg" alt="" class="w-64 h-auto">
                    </div>
                    </div>
                <p>Nilai Qi yang terbaik merupakan nilai yang tertinggi.</p>
            </ul>
        </div>
    </p>
</div>

<div class="mt-3 rounded border  w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h6 class="mb-3">
        <b class="text-blue-500 sm:text-lg">Jurnal Referensi</b>
       </h6>
    <iframe src="{{asset('assets/jurnal/jurnal_referensi.pdf')}}" class="w-full h-96 rounded-lg" frameborder="0"></iframe>
</div>



@endsection
