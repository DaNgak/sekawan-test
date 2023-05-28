<?php

namespace App\Http\Controllers;

use App\Models\OrderTransport;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.orderTransport.index', [
            'title' => 'Data Sewa Kendaraan',
            'order_transports' => OrderTransport::with(["transport", "driver", "boss"])->where('order_finish', NULL)->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.orderTransport.create', [
            'title' => 'Tambah Data Sewa Kendaraan',
            'drivers' => User::where('role', 'driver')->get(),
            'bosses' => User::where('role', 'boss')->get(),
            'transports' => Transport::with(['type'])->get(),
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
            'transport_id' => 'required',
            'driver_id' => 'required',
            'boss_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rulesData);

        $validatedData = $validator->validate($rulesData);

        if ($request->acceptance_admin === "on") {
            $validatedData['acceptance_admin'] = true;
        } else {
            unset($validatedData['acceptance_admin']);
        }

        // Ambil data kendaraan
        $transport = Transport::with(['type', 'order'])->where('id', $validatedData['transport_id'])->first();

        // Ambil + looping list order kendaraanr
        foreach ($transport->order as $orderData) {
            // cari kalau list order kendaraan belum selesai
            if($orderData->order_finish === NULL){
                $validator->errors()->add(
                    'transport_id',
                    "Kendaraan sedang digunakan. Untuk menggunakan Kendaraan ini harap selesaikan order sewa terlebih dahulu <a href='" . route('order.show', $orderData->id) . "'>disini</a>"
                );
                return redirect(route('order.create'))->withErrors($validator)->withInput();
            }
        }

        OrderTransport::create($validatedData);

        return redirect()->route('order.index')->with('success', 'Data Persewaan Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $orderTransport = OrderTransport::with(["transport", "driver", "boss"])->findOrFail($id);
        if($orderTransport->updated_at) {
            $orderTransport["create_order"] = $orderTransport["updated_at"]->diffForHumans();
        };
        return view('dashboard.orderTransport.detail', [
            'title' => "Detail Data Sewa Kendaraan",
            'order_transport' => $orderTransport,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $orderTransport = OrderTransport::with(["transport", "driver", "boss"])->findOrFail($id);
        return view('dashboard.orderTransport.edit', [
            'title' => "Edit Data Sewa Kendaraan",
            'order_transport' => $orderTransport,
            'drivers' => User::where('role', 'driver')->get(),
            'bosses' => User::where('role', 'boss')->get(),
            'transports' => Transport::with(['type'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $orderTransport = OrderTransport::with(["transport", "driver", "boss"])->findOrFail($id);
        $rulesData = [
            'transport_id' => 'required',
            'driver_id' => 'required',
            'boss_id' => 'required',
        ];

        $validatedData = $request->validate($rulesData);

        $orderTransport->update($validatedData);

        return redirect()->route('order.index')->with('success', 'Data Persewaan Kendaraan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // 
    }

    public function confirmAdmin(string $id){
        $orderTransport = OrderTransport::findOrFail($id);
        $orderTransport->acceptance_admin = true;
        $orderTransport->save();
        return redirect()->route('order.show', $id)->with('success', 'Data Persewaan Kendaraan berhasil dikonfirmasi');
    }

    public function confirmBoss(string $id){
        $orderTransport = OrderTransport::findOrFail($id);
        $orderTransport->acceptance_boss = true;
        $orderTransport->save();
        return redirect()->route('order.boss.show', $id)->with('success', 'Data Persewaan Kendaraan berhasil dikonfirmasi');
    }

    public function confirmFinish(string $id){
        date_default_timezone_set('Asia/Jakarta');
        $orderTransport = OrderTransport::findOrFail($id);
        $orderTransport->order_finish = date('Y-m-d  H:i:s');
        $orderTransport->save();
        return redirect()->route('order.show', $id)->with('success', 'Data Persewaan Kendaraan berhasil diselesaikan');
    }
}
