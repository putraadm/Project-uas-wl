<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
     <div id="EditProductModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
             <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                 <div class="px-6 py-4">
                     <div class="flex justify-between items-center">
                         <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Produk</h3>
                         <a href="{{route('kasir.product')}}" class="text-gray-400 hover:text-gray-500">
                             <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                 <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                             </svg>
                         </a>
                     </div>
                     <div class="mt-4">
                         <form id="EditProductForm" action="{{ route ('product.update', $data->id) }}" method="POST">
                              @csrf
                             <div class="mb-4">
                                 <label for="id" class="block text-sm font-medium text-gray-700">ID Produk</label>
                                 <input type="hidden" value="{{$data->id}}" type="text" id="id" name="id" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                             </div>
                             <div class="mb-4">
                                 <label for="nama_product" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                 <input type="text" value="{{$data->nama_product}}" id="nama_product" name="nama_product" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                             </div>
                             <div class="mb-4">
                                 <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                                 <input type="text" value="{{$data->harga}}" id="harga" name="harga" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                             </div>
                             <div class="mb-4">
                                 <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                                 <input type="text" value="{{$data->stock}}" id="stock" name="stock" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                             </div>
                             <div class="mb-4">
                                  <label for="id_kategori" class="block text-sm font-medium text-gray-700">ID Kategori</label>
                                  <select id="id_kategori" name="id_kategori" value="{{$data->id_kategori}}" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                     @foreach($kat as $cat)
                                     <option value="{{ $cat->id }}"{{ $cat->id == $data->id_kategori ? 'selected' : '' }}>
                                        {{$cat->nama_kategori}}
                                     </option> 
                                     @endforeach
                                  </select>
                              </div>
                             <div class="flex justify-end">
                                 <a href="{{route('kasir.product')}}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Batal</a>
                                 <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                             </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</x-app-layout>