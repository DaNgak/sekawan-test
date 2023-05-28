@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-4 align-items-center justify-content-between">
        <h2 class="w-sm-100 mb-sm-1">Data Transport | Total Data = {{ $transports->count() }}</h2>
    </div>
    @if ($transports->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Plat Nomer</th>
                        <th scope="col">BBM</th>
                        <th scope="col">Tanggal Service</th>
                        <th scope="col">Tipe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transports as $transport)        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transport->name }}</td>
                            <td>{{ $transport->number_series }}</td>
                            <td>{{ $transport->bbm_consume }}</td>
                            <td>{{ $transport->service_schedule }}</td>
                            <td>{!! $transport->type->name ?? '<b class="text-danger">-</b>' !!}</td>
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