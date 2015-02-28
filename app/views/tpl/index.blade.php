@extends('frontend_master')
@section('content')
<div class="container">
		<div class="starter-template">
		<div class="row">
			@if(isset($albums))
			@foreach($albums as $album)
			<div class="col-lg-3">
				<div class="thumbnail" style="min-height: 514px;">
					<img alt="{{$album->name}}" src="/uploads/{{$album->cover_image}}">
					<div class="caption">
					<h3>{{$album->name}}</h3>
					<p>{{$album->description}}</p>
					<p>{{count($album->Photos)}} image(s).</p>
					<p>Created date: {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
					<p><a href="{{URL::route('show_album', array('id'=>$album->id))}}" 
						class="btn btn-big btn-default">Show Gallery</a></p>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		</div><!-- /.container -->
	</div>
@stop
