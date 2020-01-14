@extends('layouts.main')

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Agenda Digital, Make Your Moment</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <h2 class="text-white pb-2 fw-normal tanggal"></h2>
            </div>
        </div>
    </div>
</div>
<div class="card mt-5">
    <div class="card-header">
        <h2>Agenda bulan Ini</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Agenda</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$agenda->agenda}}</td>
                    <td>{{$agenda->date}}</td>
                    <td>{{$agenda->time}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<script type='text/javascript'>
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;
    const tanggal = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
    const kata = document.querySelector('.tanggal');
    kata.innerHTML = tanggal;
</script>
@endsection
