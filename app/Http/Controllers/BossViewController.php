<?php

namespace App\Http\Controllers;

use App\Models\OrderTransport;
use App\Models\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BossViewController extends Controller
{
    public function orderIndex()
    {
        return view('dashboard.boss.orderTransport.index', [
            'title' => 'Data Sewa Kendaraan',
            'order_transports' => OrderTransport::with(["transport", "driver", "boss"])->where('order_finish', NULL)->where('boss_id', auth()->user()->id)->orderBy('acceptance_boss')->paginate(10),
            'order_accept' => OrderTransport::with(["transport", "driver", "boss"])->where('order_finish', NULL)->where('boss_id', auth()->user()->id)->where('acceptance_boss', true)->get()->count()
        ]);
    }

    public function orderShow(string $id)
    {
        $orderTransport = OrderTransport::with(["transport", "driver", "boss"])->findOrFail($id);
        if($orderTransport->updated_at) {
            $orderTransport["create_order"] = $orderTransport["updated_at"]->diffForHumans();
        };
        
        return view('dashboard.boss.orderTransport.detail', [
            'title' => "Detail Data Sewa Kendaraan",
            'order_transport' => $orderTransport,
        ]);
    }

    public function transportIndex()
    {
        return view('dashboard.boss.transport.index', [
            'title' => 'Data Transport',
            'transports' => Transport::with(["type"])->orderBy('name')->paginate(10),
        ]);
    }
}
