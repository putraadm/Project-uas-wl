<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8 py-8">
         <div class="py-2 flex justify-between items-center">
             <h2 class="text-2xl font-semibold leading-tight">Pemesanan</h2>
             <a href=" {{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Pesanan</a>
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
                                 Nama Produk
                             </th>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 Nama Pelanggan
                             </th>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 Jumlah
                             </th>
                             <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                 Total
                             </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($dataOrder as $data)
                         <tr>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->id }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->product->nama_product }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->nama }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->jumlah }}</p>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                 <p class="text-gray-900 whitespace-no-wrap">{{ $data->product->harga * $data->jumlah }}</p>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
</x-app-layout>
