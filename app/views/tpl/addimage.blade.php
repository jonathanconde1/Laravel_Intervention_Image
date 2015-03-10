@extends('frontend_master')
@section('content')
<div class="container" style="text-align: center;">
	<div class="span4" style="display: inline-block; margin-top:100px;">
		
		@if($errors->has())
		<div class="alert alert-block alert-error fade in"
			id="error-block">
			<?php
				$messages = $errors->all('<li>:message</li>');
			?>
			<button type="button" class="close"	data-dismiss="alert">
				×
			</button>
			<h4>Warning!</h4>
			<ul>
				@foreach($messages as $message)
				{{$message}}
				@endforeach
			</ul>
		</div>
		@endif

		<form name="addimagetoalbum" method="POST"
			action="{{URL::route('add_image_to_album')}}"
			enctype="multipart/form-data">
			<input type="hidden" name="album_id" value="{{$album->id}}" />
			<fieldset>
				<legend>Add an Image to {{$album->name}}</legend>
				
				<div class="form-group">
					<label for="description">Image Description</label>
					<textarea name="description" type="text"
					class="form-control" placeholder="Image description"></textarea>
				</div>

				<div class="form-group">
					<label for="image">Select an Image</label>
					{{Form::file('image')}}
				</div>
				<button type="submit" class="btn btn-default">Add Image!
				</button>
			</fieldset>
		</form>
		nuevo
		<form class="dropzone dz-clickable" method="POST" action="/upload">
		<div class="dz-message">
		<input type="hidden" name="album_id" value="{{$album->id}}" />
		<h4>Drag Photos to Upload</h4>
		<span>Or click to browse</span>
		</div>
		</form>
	</div>
</div> <!-- /container -->
@stop