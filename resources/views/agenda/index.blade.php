@extends('layouts.main')

@section('title','Agenda')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-3">Agenda List</h1>
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

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Agenda</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->agenda}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->time}}</td>
                    <td>
                        <a href="agenda/edit/{{$data->id}}"class="btn btn-success">Edit</a>
                        <form class="d-inline" action="agenda/delete/{{$data->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
            {!! $agendas->links() !!}
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
                <form method="post" action="/agenda">
                    @csrf
                    <div class=" form-group">
                        <label for="agenda">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection