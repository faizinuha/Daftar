@extends('products.layouts')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold border-8">Show Data</h2>
            <a class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-2 " href="{{ route('products.index') }}">Back</a>
        </div>

        <div class="md:flex">
            <div class="md:w-1/2">
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h5 class="text-xl font-bold mb-2">NIS: {{ $product->nis }}</h5>
                    <p class="mb-2"><strong>Name:</strong> {{ $product->name }}</p>
                    <p class="mb-2"><strong>Asal Sekolah:</strong> {{ $product->asal_sekolah }}</p>
                    <p class="mb-2"><strong>Alamat:</strong> {{ $product->alamat }}</p>
                    <p class="mb-2"><strong>No Telepon:</strong> {{ $product->no_telepon }}</p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="chatBtn" data-phone="{{ $product->no_telepon }}">Chat</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('chatBtn').addEventListener('click', function() {
            var phoneNumber = this.getAttribute('data-phone');
            var whatsappUrl = 'https://api.whatsapp.com/send?phone=' + phoneNumber;

            var confirmation = confirm('Anda yakin ingin chat?\nKlik "OK" untuk melanjutkan atau "Cancel" untuk batal.');

            if (confirmation) {
                window.location.href = whatsappUrl;
            } else {
                return false;
            }
        });
    </script>
@endsection
