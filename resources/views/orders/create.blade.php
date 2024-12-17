<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pemesanan') }}
        </h2>
    </x-slot>
    
    <div class="max-w-xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Formulir Pemesanan</h3>
        <form action="{{ route ('orders.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="product_id" class="block text-gray-700 font-semibold mb-2">Pilih Produk:</label>
                <select name="product_id" id="product_id" class="block w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->nama_product }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="block w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>
            <div>
                <label for="jumlah" class="block text-gray-700 font-semibold mb-2">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" class="block w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Tambah Pesanan</button>
        </form>
    </div>
</x-app-layout>
