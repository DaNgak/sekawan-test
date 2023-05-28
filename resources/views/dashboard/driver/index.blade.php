@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-5 align-items-center justify-content-between">
        <h2 class="w-sm-100 mb-sm-1">Total Driver = {{ $drivers->count() }}</h2>
    </div>
    @if ($drivers->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama Driver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $driver->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $drivers->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada Data Driver</h3>
        </div> 
    @endif
@endsection