<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;

class DriverIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.driver.index', [
            'title' => 'Data Driver',
            'drivers' => User::where('role', 'driver')->paginate(5)
        ]);
    }
}
