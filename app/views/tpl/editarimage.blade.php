@extends('frontend_master')
@section('content')
<div class="container">
	<div class="starter-template">
		<div class="media">
			<img class="media-object pull-left"
				alt="{{$album->name}}" src="/uploads/{{$album->cover_image}}" width="350px">
			<div class="media-body">
			<h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
			<p>{{$album->name}}</p>
			<div class="media">
			<h2 class="media-heading" style="font-size: 26px;">	Album Description :</h2>
			<p>{{$album->description}}</p>

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
			<button type="button"
				class="btn btn-danger btn-large">Guardar Cambios
			</button></a>

				<form name="editar_album_post" method="POST"
					action="{{URL::route('editar_album_post')}}"
					enctype="multipart/form-data"
					files=true>
					<fieldset>
						<legend>Parametros para modificar el lienzo de la foto</legend>
						
						<div>
							<label for="name">Nombre del archivo {{$album->cover_image}}</label>
						</div>
						
						<div>
							<label for="name">Por Defecto el ancla es superior izquierda</label>
						</div>
						<div class="form-group">
							
							<label for="eje_x">eje X :</label>
							<input name="eje_x" type="text" class="form-control"
							placeholder="{{Image::make('public/uploads/'.$album->cover_image)->width();}}"
							value="{{Image::make('public/uploads/'.$album->cover_image)->width();}}">
						</div>

						<div class="form-group">
							
							<label for="eje_y">eje Y :</label>
							<input name="eje_y" type="text" class="form-control"
							placeholder="{{Image::make('public/uploads/'.$album->cover_image)->height();}}"
							value="{{Image::make('public/uploads/'.$album->cover_image)->height();}}">

							<input name="nombreImagen" type="hidden" value="{{$album->cover_image}}">
						</div>
												
						<button type="submit" class="btn btn-default">
							Aplicar Cambios
						</button>
					</fieldset>
					
				</form>

			</div>
			</div>
		</div>
	</div>
	<div class="row">
	
	</div>
</div>
@stop