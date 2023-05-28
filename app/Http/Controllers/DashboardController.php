<?php

namespace App\Http\Controllers;

use App\Charts\TransportChart;
use App\Models\OrderTransport;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TransportChart $chart)
    {
        return view("dashboard.index", [
            "title" => "Dashboard",
            'total_transport' => count(Transport::all()),
            'total_order' => count(OrderTransport::all()),
            'total_driver' => count(User::where('role', 'driver')->get()),
            'total_boss' => count(User::where('role', 'boss')->get()),
            'chart' => $chart->build()
        ]);
    }
}
