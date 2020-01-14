@extends('layouts.main')

@section('title','News')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-3">News list</h1>
            <br>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary mt-3 float-lg-right" data-toggle="modal" data-target="#exampleModal">
                Insert
            </button>
        </div>

        <table class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">News</th>
                    <th scope="col">Picture</th>
                    <th scope="col" width="300px">Description</th>
                    <th scope="col">Date Active</th>
                    <th scope="col">Date Not Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->news}}</td>
                    <td>
                        @if ($data->picture)
                        <img src="{{asset('storage/'.$data->picture)}}" width="70px">
                        @else
                        N/A
                        @endif
                    </td>
                    <td>{{$data->keterangan}}</td>
                    <td>{{$data->tgl_awal}}</td>
                    <td>{{$data->tgl_akhir}}</td>
                    <td>
                        <a href="admin/news/edit/{{$data->id}}" class="btn btn-success">Edit</a>
                        <form class="d-inline" action="admin/news/delete/{{$data->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure');">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
            {!! $news->links() !!}
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="admin/news" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group">
                        <label for="news">News</label>
                        <input type="text" class="form-control" id="news" name="news">
                    </div>
                    <div class=" form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggalAwal">Tanggal Berlaku</label>
                        <input type="date" class="form-control tanggalAwal" id="tanggalAwal" name="tanggalAwal" required>

                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Kadaluarsa</label>
                        <input type="date" class="form-control tanggalAkhir" id="tanggalAkhir" name="tanggalAkhir" required>
                        <p id="validasi"></p>
                    </div>
                    <div class=" form-group">
                        <label for="picture">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const tombol = document.querySelector('.save');
    tombol.addEventListener('click', function() {
        let tanggalAwal = document.getElementById('tanggalAwal').value;
        let tanggalAkhir = document.getElementById('tanggalAkhir').value;
        if (tanggalAkhir <= tanggalAwal) {
            tombol.setAttribute('type', 'button');
            let validasi = document.getElementById('validasi');
            validasi.style.color = 'red';
            validasi.innerHTML = '*Tanggal Kadaluarsa harus lebih besar';
            return false;
        }
        tombol.setAttribute('type', 'submit');



    });
</script>

@endsection
