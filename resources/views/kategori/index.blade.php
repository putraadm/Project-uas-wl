<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>


    <div class="container mx-auto px-4 sm:px-8 py-8">
         <div class="py-2 flex justify-between items-center">
             <h2 class="text-2xl font-semibold leading-tight">Data Kategori</h2>
             <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Kategori</button>
         </div>
         <div class="my-2 overflow-x-auto">
             <div class="min-w-full shadow rounded-lg overflow-hidden">
                 <table class="min-w-full leading-normal">
                     <thead>
                         <tr>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 ID
                             </th>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 Nama Kategori
                             </th>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 Aksi
                             </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($dataKategori as $data)
                         <tr>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->id }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->nama_kategori }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex space-x-2">
                                <a href="{{route('kategori.edit', $data->id)}}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>
                                <form action="{{ route('kategori.delete', $data->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
                                </form>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

    <!-- Modal ADD -->
    <div id="addKategori" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Kategori</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-4">
                    <form id="addKategoriForm" action="{{ route ('kategori.store') }}" method="POST">
                         @csrf
                        <div class="mb-4">
                            <label for="id" class="block text-sm font-medium text-gray-700">ID Kategori</label>
                            <input type="text" id="id" name="id" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                            <input type="text" id="nama_kategori" name="nama_kategori" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Batal</button>
                            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('addKategori').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addKategori').classList.add('hidden');
            
        }
        // function openModalEdit() {
        //     document.getElementById('editKategori').classList.remove('hidden');
        // }

        // function closeModalEdit() {
        //     document.getElementById('editKategori').classList.add('hidden');
        // }
    </script>
</x-app-layout>