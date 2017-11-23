@extends('layouts.app')

@section('content')
<div class="container">
	    <div class="row">
	        <div class="col-lg-4 col-lg-offset-4">
	            <div class="pull-left">
	                <h2>Edit Film</h2>
	            </div>
	            <div class="pull-right">
	                <a class="btn btn-primary" href="{{ route('films.index') }}"> Back</a>
	            </div>
	        </div>
	        @if (count($errors) > 0)
			    <div class="col-lg-4 col-lg-offset-4">
			        <div class="alert alert-danger">
			            <strong>Whoops!</strong> There were some problems with your input.<br><br>
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
		        </div>
		    @endif
	    </div>	            
	    <div class="row">
	        <div class="col-lg-4 col-lg-offset-4">
			    {!! Form::open(array('route' => ['films.update', $film],'method'=>'POST','files'=>true)) !!}
			         @include('film.form')
			    {!! Form::close() !!}
	        </div>
	    </div>
    </div>
@endsection
