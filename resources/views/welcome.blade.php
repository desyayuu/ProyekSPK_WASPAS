@extends('layouts.app')
@section('content')



<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-4xl font-bold text-gray-800 dark:text-white">Welcome</h5>
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
                <table class="w-full border border-gray-300 dark:border-gray-500">
                    <thead>
                        <tr>
                            <!-- Kolom header (Anda dapat menyesuaikan sesuai kebutuhan) -->
                            <th class="border border-gray-300 dark:border-gray-500 p-2">Kriteria 1</th>
                            <th class="border border-gray-300 dark:border-gray-500 p-2">Kriteria 2</th>
                            <!-- ... Tambahkan kolom header lainnya sesuai dengan jumlah kriteria ... -->
                            <th class="border border-gray-300 dark:border-gray-500 p-2">Kriteria N</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris-baris matriks (Anda dapat menyesuaikan sesuai kebutuhan) -->
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X11</td>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X12</td>
                            <!-- ... Tambahkan sel matriks lainnya sesuai dengan jumlah kriteria ... -->
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X1N</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X21</td>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X22</td>
                            <!-- ... Tambahkan sel matriks lainnya sesuai dengan jumlah kriteria ... -->
                            <td class="border border-gray-300 dark:border-gray-500 p-2">X2N</td>
                        </tr>
                        <!-- ... Tambahkan baris matriks lainnya sesuai dengan jumlah alternatif ... -->
                        <tr>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">XN1</td>
                            <td class="border border-gray-300 dark:border-gray-500 p-2">XN2</td>
                            <!-- ... Tambahkan sel matriks lainnya sesuai dengan jumlah kriteria ... -->
                            <td class="border border-gray-300 dark:border-gray-500 p-2">XNN</td>
                        </tr>
                    </tbody>
                </table>
                <li>Menormalisasi Nilai <b>Rij </b>dengan rumus sebagai berikut:</li>

                <li>Menghitung data <b>nilai alternatif (Qi) </b> dengan menggunakan rumus berikut:</li>
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
