@extends('products.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />

            <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Dashboard</h2>
                    <a class="btn btn-danger rounded-pill mt-2 " href="{{ route('products.create') }}">Tambah Data</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="products-table" class="table table-danger">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Name</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Name Wali</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col" width="200px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->nis }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->asal_sekolah }}</td>
                                    <td>{{ $product->alamat }}</td>
                                    <td>{{ $product->name_wali }}</td>
                                    <td>{{ $product->no_telepon }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('products.show', $product->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm deleteBtn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.deleteBtn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan aksi bawaan dari tombol submit

                // Tampilkan konfirmasi sebelum penghapusan
                var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');

                if (confirmation) {
                    // Jika pengguna menekan "OK", kirimkan formulir penghapusan
                    this.closest('form').submit();
                }
            });
        });
        new DataTable('#products-table');
    </script>
@endsection
