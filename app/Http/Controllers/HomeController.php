<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $agendas = DB::table('agendas')
            ->whereMonth('date', $bulan)
            ->whereYear('date', $tahun)
            ->orderBy('date', 'asc')
            ->get();
        return view('home', ['agendas' => $agendas]);
    }
}
