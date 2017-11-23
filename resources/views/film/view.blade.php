@extends('layouts.app')

@section('content')
<div class="container">
    
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<img src="http://localhost:8000/images/{{$film->photo}}" />
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$film->name}}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star {{($film->rating >= 1) ? 'checked' : ''}}"></span>
								<span class="fa fa-star {{($film->rating >= 2) ? 'checked' : ''}}"></span>
								<span class="fa fa-star {{($film->rating >= 3) ? 'checked' : ''}}"></span>
								<span class="fa fa-star {{($film->rating >= 4) ? 'checked' : ''}}"></span>
								<span class="fa fa-star {{($film->rating >= 5) ? 'checked' : ''}}"></span>
							</div>
						</div>
						<p class="product-description">{{$film->description}}</p>
						<h4 class="price">current price: <span>${{$film->ticket_price}}</span></h4>
						<h5 class="sizes">Genre:
							<?php foreach ($film->filmgenre as $genre) { ?>
								<span class="size">{{$genre->genre->name}}</span>								
							<?php } ?>
						</h5>
						<h5 class="sizes">Country:
							<span class="size">{{$film->country}}</span>
						</h5>
					</div>

				</div>
				<div class="col-md-8 col-md-offset-2 text-center">
			    <div class="well">
			        <h4>What is on your mind?</h4>
			        @guest
					    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login to add your comments</a>
			        @else
			        {!! Form::open(array('route' => ['films.addcomment', $film->slug],'method'=>'POST')) !!}
				        <div class="col-md-4">
					        <input name="comment" type="text" id="userComment" class="form-control pull-left input-sm chat-input" placeholder="Write your message here..." />
						    
					    </div>
					    <button class="btn btn-primary pull-left" type="submit"><i class="fa fa-comment"></i> Add Comment</button>
				    {!! Form::close() !!}
					    
				    @endguest
			    <hr data-brackets-id="12673">
			    <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
			    	<?php foreach ($film->filmcomments as $comments) { ?>
			    		<strong class="pull-left primary-font">{{$comments->user->name}}</strong>
				        	<small class="pull-right text-muted">
				           <i class="fa fa-clock-o"></i>{{$comments->created_at}}</small>
				        </br>
				        <li class="ui-state-default">{{$comments->comment}}</li>
				        </br>
			    	<?php } ?>
			    </ul>
			    </div>
			</div>
		</div>
</div>
@endsection
