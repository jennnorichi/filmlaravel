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
    <div class="input-group">
        <input type="text" id="userComment" class="form-control input-sm chat-input" placeholder="Write your message here..." />
	    <span class="input-group-btn" onclick="addComment()">     
            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-comment"></i> Add Comment</a>
        </span>
    </div>
    <hr data-brackets-id="12673">
    <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
        <strong class="pull-left primary-font">James</strong>
        <small class="pull-right text-muted">
           <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
        </br>
        <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
        </br>
         <strong class="pull-left primary-font">Taylor</strong>
        <small class="pull-right text-muted">
           <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
        </br>
        <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        
    </ul>
    </div>
			</div>
		</div>
</div>
@endsection
