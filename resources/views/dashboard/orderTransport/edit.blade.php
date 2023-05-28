@extends('layout.main.main')

@section('container')
	<h2 class="mb-3">Edit Data Sewa Kendaraan</h2>
	<div class="col-lg-8 p-0 mb-3">
		<a class="btn btn-primary w-100 w-lg-auto" href="{{ route('order.index') }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-lg-8 mb-5 p-0">
        <form action="{{ route('order.update', $order_transport->id) }}" method="post">
			@csrf
            @method("put")
			<div class="mb-3">
				<label for="transport_id" class="form-label @error('transport_id') is-invalid @enderror">Nama Kendaraan (Tipe)</label>
				@if ($transports->count() > 0)
					<select class="form-select" name="transport_id" id="transport_id" required>
						@foreach ($transports as $transport)
							@if (old("transport_id", $order_transport->transport_id) == $transport->id)
								<option value="{{ $transport->id }}" selected>{{ $transport->name }} / {{ $transport->number_series }} ( {{ $transport->type->name }} )</option>
							@else
								<option value="{{ $transport->id }}">{{ $transport->name }} / {{ $transport->number_series }} ( {{ $transport->type->name }} )</option>
							@endif
						@endforeach
					</select>
				@else
					<div class="form-control is-invalid">Tidak ada data Kendaraan</div>
				@endif
				@error('transport_id')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="driver_id" class="form-label @error('driver_id') is-invalid @enderror">Driver Kendaraan</label>
				@if ($drivers->count() > 0)
					<select class="form-select" name="driver_id" id="driver_id" required>
						@foreach ($drivers as $driver)
							@if (old("driver_id", $order_transport->driver_id) == $driver->id)
								<option value="{{ $driver->id }}" selected>{{ $driver->username }}</option>
							@else
								<option value="{{ $driver->id }}">{{ $driver->username }}</option>
							@endif
						@endforeach
					</select>
				@else
					<div class="form-control is-invalid">Tidak ada data Driver Kendaraan</div>
				@endif
				@error('driver_id')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="boss_id" class="form-label @error('boss_id') is-invalid @enderror">Pihak yang menyetujui (Atasan)</label>
				@if ($bosses->count() > 0)
					<select class="form-select" name="boss_id" id="boss_id" required>
						@foreach ($bosses as $boss)
							@if (old("boss_id", $order_transport->boss_id) == $boss->id)
								<option value="{{ $boss->id }}" selected>{{ $boss->username }}</option>
							@else
								<option value="{{ $boss->id }}">{{ $boss->username }}</option>
							@endif
						@endforeach
					</select>
				@else
					<div class="form-control is-invalid">Tidak ada data Pihak / Atasan</div>
				@endif
				@error('boss_id')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-warning">Edit Data</button>
		</form>
    </div>
@endsection