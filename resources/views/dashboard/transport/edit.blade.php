@extends('layout.main.main')

@section('container')
	<h2 class="mb-3">Edit Data Transport</h2>
	<div class="col-lg-8 p-0 mb-3">
		<a class="btn btn-primary w-100 w-lg-auto" href="{{ route('transport.index') }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-lg-8 mb-5 p-0">
        <form action="{{ route('transport.update', $transport->id) }}" method="post">
			@csrf
            @method("put")
			<div class="mb-3">
				<label for="name" class="form-label">Nama Kendaraan</label>
				<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old("name", $transport->name) }}" required>
				@error('name')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="number_series" class="form-label">Plat Nomer Kendaraan</label>
				<input type="text" name="number_series" class="form-control @error('number_series') is-invalid @enderror" id="number_series" value="{{ old("number_series", $transport->number_series) }}" required>
				@error('number_series')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="type_transport_id" class="form-label @error('type_transport_id') is-invalid @enderror">Tipe Kendaraan</label>
				@if ($type_transports->count() > 0)
					<select class="form-select" name="type_transport_id" id="type_transport_id" required>
						@foreach ($type_transports as $type_transport)
							@if (old("type_transport_id", $transport->type_transport_id) == $type_transport->id)
								<option value="{{ $type_transport->id }}" selected>{{ $type_transport->name }}</option>
							@else
								<option value="{{ $type_transport->id }}">{{ $type_transport->name }}</option>
							@endif
						@endforeach
					</select>
				@else
					<div class="form-control is-invalid">Tidak ada data tipe kendaraan</div>
				@endif
				@error('type_transport_id')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="bbm_consume" class="form-label">Konsumsi BBM *({{ $transport->bbm_consume_rupiah }})</label>
				<input type="number" name="bbm_consume" class="form-control @error('bbm_consume') is-invalid @enderror" id="bbm_consume" value="{{ old("bbm_consume", $transport->bbm_consume) }}" required>
				@error('bbm_consume')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="service_schedule" class="form-label">Tanggal Servis Terakhir</label>
				<input type="date" name="service_schedule" class="form-control @error('service_schedule') is-invalid @enderror" id="service_schedule" value="{{ old("service_schedule", $transport->service_schedule) }}" required>
				@error('service_schedule')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-warning">Edit Data</button>
		</form>
    </div>
@endsection