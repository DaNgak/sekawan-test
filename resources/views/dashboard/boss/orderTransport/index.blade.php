@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-column mb-4 align-items-start justify-content-between">
        <h2 class="w-sm-100 mb-sm-1">Data Order Transport (Ongoing) | Total Data = {{ $order_transports->count() }}</h2>
        <h4 class="w-sm-100 mb-sm-1">Total Data Disetujui = {{ $order_accept }} | Total Data Belum Disetujui= {{ $order_transports->count() - $order_accept }}</h4>
    </div>
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
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Status</th>
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
                            <td>{!! $order->driver->username ?? '<b class="text-danger">-</b>' !!}</td>
                            <td>{!! $order->acceptance_boss ?  "<b class='text-success'>Disetujui</b>"  :  "<b class='text-danger'>Belum Disetujui</b>" !!}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('order.boss.show', $order->id) }}" class="btn btn-primary mr-2">Detail</a>
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
            <h3>Tidak ada Data Order Transport</h3>
        </div> 
    @endif
@endsection