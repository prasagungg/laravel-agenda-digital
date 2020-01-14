<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(5);
        return view('news.index', ['news' => $news])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news =  new \App\News;
        $news->news = $request->get('news');
        $news->keterangan = $request->get('keterangan');
        $news->tgl_awal = $request->get('tanggalAwal');
        $news->tgl_akhir = $request->get('tanggalAkhir');
        if ($request->file('picture')) {
            $file = $request->file('picture')->store('picture', 'public');
            $news->picture =  $file;
        }
        $news->save();
        return redirect('/news')->with('status', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', ['news' => $news]);
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
        $news = News::find($id);
        $news->news = $request->get('news');
        $news->keterangan = $request->get('keterangan');
        $news->tgl_awal = $request->get('tanggalAwal');
        $news->tgl_akhir = $request->get('tanggalAkhir');
        if ($request->picture) {
            if ($news->picture && file_exists(storage_path('app/public/' . $news->picture))) {
                \Storage::delete('public/' . $news->picture);
                $file = $request->file('picture')->store('picture', 'public');
                $news->picture = $file;
            }
        }
        $news->save();
        return redirect('/news')->with('status', 'News Succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect('/news')->with('status', 'News Succesfulyy deleted');
    }
}
