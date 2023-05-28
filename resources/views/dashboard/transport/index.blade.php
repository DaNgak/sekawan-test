@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-5 align-items-center justify-content-between">
        <a class="btn btn-primary w-sm-100 mb-sm-1" href="{{ route('transport.create') }}">Tambah Data Transport</a>
    </div>
    @if (session()->has("success")) 
        <div class="col-md-5 p-0">  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($transports->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Plat Nomer</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transports as $transport)        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transport->name }}</td>
                            <td>{{ $transport->number_series }}</td>
                            <td>{!! $transport->type->name ?? '<b class="text-danger">-</b>' !!}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('transport.show', $transport->id) }}" class="btn btn-primary mr-2">Detail</a>
                                <a href="{{ route('transport.edit', $transport->id) }}" class="btn btn-warning mr-2">Edit</a>
                                <form action="{{ route('transport.destroy', $transport->id) }}" class="d-inline" method="post">
                                    @csrf
                                    @method("delete")
                                    <button onclick="return confirm('Konfirmasi hapus data ?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $transports->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada Data Transports</h3>
        </div> 
    @endif
@endsection