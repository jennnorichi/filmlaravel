<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Film Name:</strong>
            {!! Form::text('name', (isset($film->name) ? $film->name: null), array('placeholder' => 'Film Name','class' => 'form-control','id' => 'filmName')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Film Slug:</strong>
            {!! Form::text('slug', (isset($film->slug) ? $film->slug: null), array('placeholder' => 'Slug','class' => 'form-control','id' => 'filmSlug')) !!}
            <span class="hint">Will be used for SEO friendly URL, must not contain spaces. Use URL allowed Characters.</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::textarea('description', (isset($film->description) ? $film->description: null), array('placeholder' => 'Film Description','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Film Name:</strong>
            <section class='rating-widget'>
  
              <!-- Rating Stars Box -->
              <div class='rating-stars text-center'>
                <ul id='stars'>
                  <li class='star' title='Poor' data-value='1'>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                  <li class='star' title='Fair' data-value='2'>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                  <li class='star' title='Good' data-value='3'>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                  <li class='star' title='Excellent' data-value='4'>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                  <li class='star' title='WOW!!!' data-value='5'>
                    <i class='fa fa-star fa-fw'></i>
                  </li>
                </ul>
              </div>
            </section>
            {{ Form::hidden('rating', (isset($film->rating) ? $film->rating: null), array("id" => "ratingValue")) }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Release Date:</strong>
            {!! Form::text('release_date', (isset($film->release_date) ? $film->release_date: null), array('placeholder' => 'Release Date','class' => 'form-control datepicker')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ticket Price:</strong>
            {!! Form::text('ticket_price', (isset($film->ticket_price) ? $film->ticket_price: null), array('placeholder' => 'Ticket Price','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Genre:</strong>
            {!! Form::select('genre[]', $genres, (isset($film->filmgenre)) ? $film->filmgenre : [], array("class" => "form-control multiple", "multiple" => "multiple")); !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Country:</strong>
            {!! Form::text('country', (isset($film->country) ? $film->country: null), array('placeholder' => 'Country','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Photo:</strong>
            {!! Form::file('photo', array('placeholder' => 'Photo','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>