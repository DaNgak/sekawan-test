@extends('layout.main.main')

@section('container')
    <h2 class="mb-3 fs-sm-3">Detail Transport</h2>
    <div class="col-xl-8 p-0 mb-3 mb-md-5">
        <a class="btn btn-primary me-0 me-3 w-100 w-lg-auto mb-3 mb-lg-0" href="{{ route('transport.index') }}">Kembali ke Data Tabel</a>
        {{-- <a class="btn btn-warning me-0 me-3 w-100 w-lg-auto mb-3 mb-lg-0" href="{{ route('transport.edit', $transport->id) }}">Edit Data</a>
        <form action="{{ route('transport.destroy', $transport->id) }}" class="d-inline w-100 w-lg-auto mb-3 mb-lg-0" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Konfirmasi Hapus ?')" class="btn btn-danger w-100 w-lg-auto">Hapus</button>
        </form> --}}
    </div>
    <div class="col-xl-8 mb-5 p-0">
        <div class="d-flex p-0 flex-sm-column">
            <div class="row mb-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Nama</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $transport->name }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Plat Nomer Kendaraan</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $transport->number_series }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Tipe Kendaraan</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary {{ $transport->type->name ?? "text-danger"}}">{{ $transport->type->name ?? "Tidak ada tipe kendaraan"}}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Konsumsi BBM (Rp.)</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $transport->bbm_consume }}</span>
                </div>
            </div>
            <div class="row my-3 mb-4 p-0">
                <div class="col-lg-5">
                    <span class="form-control border-1 border-primary">Tanggal Servis Terakhir</span>
                </div>
                <div class="col-lg-7">
                    <span class="form-control border-1 border-primary">{{ $transport->service_schedule }}</span>
                </div>
            </div>
            <div class="row my-3 mb-4 p-0">
                @if (count($transport->order) > 0)
                    <div class="col-lg-5">
                        <span class="form-control border-1 border-primary">Total Order Transport</span>
                    </div>
                    <div class="col-lg-7">
                        <span class="form-control border-1 border-primary">{{ count($transport->order) }} Kali Order Sewa</span>
                    </div>
                @else
                    <div class="col-12 mb-3 p-0">
                        <span class="form-control border-1 border-danger text-danger">Tidak ada riwayat order untuk kendaraan ini</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection