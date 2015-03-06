@extends('frontend_master')
@section('content')
<div class="container">
	<div class="starter-template">
		<div class="media">
			<img class="media-object pull-left"
				alt="{{$album->name}}" src="/uploads/{{$album->cover_image}}" width="350px">
			<div class="media-body">
			<h2 class="media-heading" style="font-size: 26px;">Nombre del Album : {{$album->name}}</h2>
			
			<div class="media">
			<h2 class="media-heading" style="font-size: 26px;">	Album Description : {{$album->description}}</h2>
			

			<a href="{{URL::route('add_image',array('id'=>$album->id))}}">
			<button type="button"
				class="btn btn-primary btn-large">
				Add New Image to Album
			</button></a>
			
			<a href="{{URL::route('delete_album',array('id'=>$album->id))}}" 
				onclick="return confirm('Are you sure?')">
			<button type="button"
				class="btn btn-danger btn-large">Delete Album
			</button></a>
			<a href="{{URL::route('editar_album',array('id'=>$album->id))}}" 
				onclick="return confirm('Are you sure?')">
			Editar Foto de Album
			</a>

			</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="main" class="gallery clearfix">
		@foreach($album->Photos as $photo)
			<div class="col-lg-3">
				<div class="thumbnail" style="max-height: 350px; min-height: 350px;">
					<a href="/uploads/{{$photo->image}}" rel="prettyPhoto[gallery2]" title="Aqui la Descripción de la imagen">
					<img alt="{{$album->name}}" src="/uploads/thumbs/{{$photo->image}}">
					Holasss
					</a>
					
					<div class="caption">
					<p>{{$photo->description}}</p>
					
					<p>
						<p>
						Created date: {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}
						</p>
					</p>
					<a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" 
						onclick="return confirm('Are you sure?')" >
						<button type="button" class="btn btn-danger btn-small">
							Delete Image 
						</button></a>
					</div>
				</div>
			</div>
		@endforeach
		</div>



	</div>

</div>
@stop