<x-layout>


    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      @foreach ($users as $user)
          <a href="{{ route('admin.detail', ['id' => $user->id]) }}"
              class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
  
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user->username }}</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">{{ $user->nama_lengkap }}</p>
          </a>
      @endforeach
    </div>
</x-layout>
