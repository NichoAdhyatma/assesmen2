<x-layout>
    <h1 class="text-xl font-semibold my-4">Detail Result {{ $data[0]->user->nama_lengkap ?? '' }}</h1>


    <div class="flex flex-col items-start gap-4">
        @foreach ($data->reverse() as $item)
            <a href="{{ route('admin.result', ['item' => $item->id_penilaian, 'user' => $item->id_user]) }}"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Psikogram
                    {{ Carbon\Carbon::parse($item->tanggal_penilaian)->isoFormat('D MMMM , YYYY') }}
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Psikogram tanggal:
                    {{ $item->tanggal_penilaian }},
                    Dengan ID:
                    {{ $item->id_penilaian }}</p>
            </a>
        @endforeach
    </div>

</x-layout>
