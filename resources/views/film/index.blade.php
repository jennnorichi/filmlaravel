@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Films</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('films.create') }}"> Create New Film</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Release Date</th>
            <th>Rating</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($films as $film)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $film->name}}</td>
        <td>{{ $film->release_date}}</td>
        <td>{{ $film->rating}}</td>
        <td>
            <!-- <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Show</a> -->
            <!-- <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Edit</a> -->
            {!! Form::open(['method' => 'DELETE','route' => ['films.destroy', $film->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $films->render() !!}
    
        </div>
@endsection