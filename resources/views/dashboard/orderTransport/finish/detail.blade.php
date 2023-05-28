@extends('layout.main.main')

@section('container')
    <h2 class="mb-3 fs-sm-3">Detail Data Sewa Kendaraan (Finished) </h2>
    <div class="col-xl-8 p-0 mb-4">
        <a class="btn btn-primary me-0 me-3 w-100 w-lg-auto mb-3 mb-lg-0" href="{{ route('order.finish.index') }}">Kembali ke Data Tabel</a>
        @if (auth()->user()->role === "admin")    
            <form action="{{ route('order.finish.destroy', $order_transport->id) }}" class="d-inline w-100 w-lg-auto me-3 mb-3 mb-lg-0" method="post">
                @csrf
                @method("delete")
                <button onclick="return confirm('Konfirmasi Hapus Data Order Sewa ?')" class="btn btn-danger w-100 w-lg-auto">Hapus Data Order Sewa</button>
            </form>
        @endif
    </div>
    @if (session()->has("success")) 
        <div class="col-md-8 mb-4 p-0">  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="col-xl-8 mb-5 p-0">
        <div class="d-flex p-0 flex-sm-column">
            <div class="row mb-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Nama Kendaraan / Plat Nomer</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $order_transport->transport->name }} / {{ $order_transport->transport->number_series }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Tipe Kendaraan</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary {{ $order_transport->transport->type->name ?? "text-danger"}}">{{ $order_transport->transport->type->name ?? "Tidak ada tipe kendaraan"}}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Nama Driver</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $order_transport->driver->username }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Nama Pihak / Atasan</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $order_transport->boss->username }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Tanggal Mulai Sewa</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $order_transport->create_order }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Tanggal Selesai Sewa</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $order_transport->finish_order }}</span>
                </div>
            </div>
            <div class="row my-3 mb-4 p-0">
                <div class="col-lg-12">
                    <span class="form-control border-1 border-primary">Persetujuan Sewa Kendaraan</span>
                </div>
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Persetujuan Admin</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{!! $order_transport->acceptance_admin ? "<b class='text-success'>Disetujui</b>"  :  "<b class='text-danger'>Menunggu Konfirmasi Admin</b>"  !!}</span>
                </div>
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Persetujuan Atasan</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{!!  $order_transport->acceptance_boss ?  "<b class='text-success'>Disetujui</b>"  :  "<b class='text-danger'>Menunggu Konfirmasi Atasan</b>" !!}</span>
                </div>
            </div>
        </div>
    </div>
@endsection