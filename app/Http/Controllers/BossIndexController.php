<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BossIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.boss.index', [
            'title' => 'Data Boss',
            'bosses' => User::where('role', 'boss')->paginate(5)
        ]);
    }
}
