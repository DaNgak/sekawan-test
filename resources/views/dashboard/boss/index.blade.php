@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-5 align-items-center justify-content-between">
        <h2 class="w-sm-100 mb-sm-1">Total Atasan = {{ $bosses->count() }}</h2>
    </div>
    @if ($bosses->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama Atasan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bosses as $boss)        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $boss->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $bosses->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada Data Atasan</h3>
        </div> 
    @endif
@endsection