@extends('layouts.main')

@section('title','Edit News')

@section('content')
<div class="container">
    <form method="post" action="/news/{{$news->id}}/edit" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="news">News</label>
            <input type="text" class="form-control" id="news" name="news" value="{{$news->news}}" required>
        </div>
        <div class=" form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan">{{$news->keterangan}}</textarea>
        </div>
        <div class=" form-group">
            <label for="tanggalAwal">Tanggal Berlaku</label>
            <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" value="{{$news->tgl_awal}}" required>
        </div>
        <div class="form-group">
            <label for="tanggalAkhir">Tanggal Kadaluarsa</label>
            <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" required value="{{$news->tgl_akhir}}">
        </div>
        <div class="form-group">
            @if ($news->picture)
            <img src="{{asset('storage/'.$news->picture)}}" width="120px" />
            <br>
            @else
            No Picture For News
            @endif
            <input type="file" class="form-control" id="news" name="picture">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah Picture</small>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </div>
    </form>
</div>
@endsection
