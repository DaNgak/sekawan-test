@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-5 align-items-center justify-content-between">
        <h2 class="w-sm-100 mb-sm-1">Data Order Sewa Kendaraan (Finished) | Total = {{ $order_transports->count() }}</h2>
    </div>
    @if (session()->has("success")) 
        <div class="col-md-8 p-0">  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($order_transports->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Plat Nomer</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Nama Atasan</th>
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_transports as $order)        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->transport->name }}</td>
                            <td>{{ $order->transport->number_series }}</td>
                            <td>{{ $order->transport->type->name }}</td>
                            <td>{!! $order->boss->username ?? '<b class="text-danger">-</b>' !!}</td>
                            <td>{!! $order->driver->username ?? '<b class="text-danger">-</b>' !!}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('order.finish.show', $order->id) }}" class="btn btn-primary mr-2">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $order_transports->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada Data Order Transport yang Selesai</h3>
        </div> 
    @endif
@endsection