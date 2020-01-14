<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\News;
use Illuminate\Support\Facades\DB;

class IntiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggal = date('Y') . '-' . date('m') . '-' . date('d');
        $agendas = DB::table('agendas')
            ->whereDate('date', $tanggal)
            ->orderBy('time', 'asc')
            ->get();
        $news = DB::table('news')
            ->where('tgl_awal', '<=',  $tanggal)
            ->where('tgl_akhir', '>',  $tanggal)
            ->get();
        return view('inti', ['news' => $news], ['agendas' => $agendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tanggal = $request->tanggal;
        $agendas = DB::table('agendas')
            ->whereDate('date', $tanggal)
            ->orderBy('time', 'asc')
            ->get();
        return view('show', ['tanggal' => $tanggal], ['agendas' => $agendas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
