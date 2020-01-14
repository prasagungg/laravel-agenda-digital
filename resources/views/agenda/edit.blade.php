@extends('layouts.main')

@section('title','Edit Agenda')

@section('content')
<div class="container">
    <form method="post" action="/agenda/{{$agendas->id}}/edit">
        @method('patch')
        @csrf
        <div class=" form-group">
            <label for="agenda">Agenda</label>
            <input type="text" class="form-control" id="agenda" name="agenda" value="{{$agendas->agenda}}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$agendas->date}}">
        </div>
        <div class="form-group">
            <label for="time">time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{$agendas->time}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </div>
    </form>
</div>
@endsection