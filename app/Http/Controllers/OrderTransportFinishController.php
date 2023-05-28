<?php

namespace App\Http\Controllers;

use App\Models\OrderTransport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderTransportFinishController extends Controller
{
    public function index()
    {
        return view('dashboard.orderTransport.finish.index', [
            'title' => 'Data Sewa Kendaraan Finished',
            'order_transports' => OrderTransport::with(["transport", "driver", "boss"])->whereNotNull('order_finish')->paginate(10),
        ]);
    }

    public function show(string $id)
    {
        $orderTransportFinised = OrderTransport::with(["transport", "driver", "boss"])->findOrFail($id);
        
        if($orderTransportFinised->order_finish === NULL) {
            return abort(404);
        };

        if($orderTransportFinised->updated_at) {
            $orderTransportFinised["create_order"] = $orderTransportFinised["updated_at"]->diffForHumans();
        };

        $dateTimeCarbon = Carbon::parse($orderTransportFinised["order_finish"]);
        $orderTransportFinised["finish_order"] = $dateTimeCarbon->diffForHumans();
        return view('dashboard.orderTransport.finish.detail', [
            'title' => 'Detail Data Sewa Kendaraan Finished',
            'order_transport' => $orderTransportFinised,
        ]);
    }

    public function destroy(string $id)
    {
        $orderTransportFinised = OrderTransport::findOrFail($id);

        if($orderTransportFinised->order_finish === NULL) {
            return abort(404);
        };

        $orderTransportFinised->delete();
        return redirect()->route('order.finish.index', $id)->with('success', 'Data Persewaan Kendaraan berhasil dihapus');
    }
}
