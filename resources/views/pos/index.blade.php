@extends('template.layout')

@section('content')

<div class="container">
    <h3 id="h1-index" class="mt-2 text-center font-weight-bold">POS DASHBOARD</h3>
</div>
    
<div class="container">
    <div class="text-center mt-5 mb-2"> 
        <a href="{{ route('pos.create') }}" class="btn btn-success">add data</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">image</th>
            <th scope="col">kode barang</th>
            <th scope="col">nama barang</th>
            <th scope="col">stok</th>
            <th scope="col">kategori</th>
            <th scope="col">aksi</th> 
        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @forelse ($datapos as $data)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td class="text-center">
                    <img src="{{ asset('/storage/data/'.$data->image) }}" alt="gambar" class="rounded" width="50px">
                </td>
                <td>{{ $data->kode_barang }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->kategori }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Yakin di hapus?');" action="{{ route('pos.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('pos.show', $data->id) }}" class="btn btn-sm btn-warning">SHOW</a>
                        <a href="{{ route('pos.edit', $data->id) }}" class="btn btn-sm btn-success">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">DELL</button>
                    </form>
                </td>
                <?php $i++ ?>
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data belum tersedia
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $datapos->links() }}
</div>

{{-- alert succes and error --}}
<script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
</script>

@endsection