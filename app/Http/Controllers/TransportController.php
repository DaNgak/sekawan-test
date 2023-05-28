<?php

namespace App\Http\Controllers;

use App\Exports\TransportExport;
use App\Models\Transport;
use App\Models\TypeTransport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transport.index', [
            'title' => 'Transport',
            'transports' => Transport::with(["type"])->orderBy('name')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transport.create', [
            'title' => 'Tambah Transport',
            'type_transports' => TypeTransport::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulesData = [
            'name' => 'required',
            'number_series' => 'required|unique:transports',
            'bbm_consume' => 'required||numeric',
            'service_schedule' => 'required|date',
            'type_transport_id' => 'required',
        ];

        $validatedData = $request->validate($rulesData);

        Transport::create($validatedData);

        return redirect()->route('transport.index')->with('success', 'Data Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        $transport["bbm_consume"] = "Rp. " . number_format($transport->bbm_consume, 0, ',', '.');

        return view('dashboard.transport.detail', [
            'title' => "Detail Transport",
            'transport' => $transport->loadMissing(['order', 'type']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        $transport["bbm_consume_rupiah"] = "Rp. " . number_format($transport->bbm_consume, 0, ',', '.');

        return view('dashboard.transport.edit', [
            'title' => 'Edit Transport',
            'transport' => $transport->loadMissing(['type']),
            'type_transports' => TypeTransport::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        $rulesData = [
            'name' => 'required',
            'number_series' => 'required|unique:transports,name,'.$transport->id,
            'bbm_consume' => 'required||numeric',
            'service_schedule' => 'required|date',
            'type_transport_id' => 'required',
        ];

        $validatedData = $request->validate($rulesData);

        $transport->update($validatedData);
        return redirect()->route('transport.index')->with('success', 'Data Kendaraan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transport $transport)
    {
        $transport->delete();
        return redirect()->route('transport.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }

    public function export() 
    {
        // return Excel::download(new TransportExport, 'transports' . Carbon::now()->timestamp .  '.xlsx');

        return (new TransportExport)->download('transports' . Carbon::now()->timestamp .  '.xlsx');
    }

}
