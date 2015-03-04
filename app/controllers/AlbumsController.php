<?php
class AlbumsController extends BaseController{

	public function getList(){
		$albums = Album::with('Photos')->get();
		return View::make('tpl.index')
		->with('albums',$albums);
	}



	public function getAlbum($id){
	
		$album = Album::with('Photos')->find($id);
		return View::make('tpl.album')
		->with('album',$album);
		
	}
	public function getAlbumEditar($id){
	
		$album = Album::with('Photos')->find($id);
		return View::make('tpl.editarimage')
		->with('album',$album);
		
	}

	public function postAlbumEditar (){
	
		$filename = Input::get('nombreImagen');
		$ancla_x = Input::get('ancla_x');
		$ancla_y = Input::get('ancla_y');

		$eje_x = Input::get('eje_x');
		$eje_y = Input::get('eje_y');
		
		if(isset($filename)&&isset($eje_y)&&isset($eje_x))
		{
			echo "puedo continuar";
			//modifico al tamaño requerido
			//Image::make(Config::get( 'image.upload_folder').'/'.$filename)->resizeCanvas($eje_x, $eje_y)


			//reescribo el fichero o archivo



			Image::make(Config::get( 'image.upload_folder').'/'.$filename)
			->resizeCanvas($eje_x - $ancla_x,$eje_y -  $ancla_y,'bottom-right',false)
			->resizeCanvas($eje_x, $eje_y,'top-left',false)
			//->resize(Config::get( 'image.thumb_width'),Config::get( 'image.thumb_height'))
			->save(Config::get( 'image.upload_folder').'/'.$filename);


		}else{
			echo "falta un valor";
		}


		//aqui toda la logica para editar las dimensiones de la imagen
		
	}





	public function getForm(){
		return View::make('tpl.createalbum');
	}

	public function postCreate(){
		$validation = Validator::make(Input::all(),	Photo::$upload_rules);
		
		if($validation->fails()) {
		
			return Redirect::route('create_album_form')
			->withErrors($validation)
			->withInput();
		}else{

		
		$file = Input::file('cover_image');
		$random_name = str_random(8);
		$destinationPath = Config::get( 'image.upload_folder');
		$extension = $file->getClientOriginalExtension();
		$filename=$random_name.'_cover.'.$extension;
		//aqui le digo que almacene la foto original en esta direccion
		$uploadSuccess = Input::file('cover_image')->move($destinationPath, $filename);
		
		//aqui uso Intervention Image para modificar la imagen a las dimensiones que se requieran
		Image::make(Config::get( 'image.upload_folder').'/'.$filename)
		->resize(Config::get( 'image.thumb_width'),Config::get( 'image.thumb_height'))->save(Config::get
		( 'image.thumb_folder').'/'.$filename);


		//
		



		$album = Album::create(array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'cover_image' => $filename,
		));
		

		

		return Redirect::route('show_album',array('id'=>$album->id));

		}


		
	}


/*
//Let's validate the form first with the rules which are
	//set at the model
	$validation = Validator::make(Input::all(),
	Photo::$upload_rules);
	//If the validation fails, we redirect the user to the
	//index page, with the error messages
	if($validation->fails()) {
		return Redirect::to('/')
		->withInput()
		->withErrors($validation);
	}
	else {
		// Si la validación pasa, que pongamos la imagen a la
		// base de datos y el proceso se
		$image = Input::file('image');
		$filename = $image->getClientOriginalName();
		$filename = pathinfo($filename, PATHINFO_FILENAME);
		// Debemos sal y hacer una versión URL amigable de
		// el nombre del archivo
		// (En aplicación ideal, debe comprobar el nombre del archivo
		// para ser único)
		$fullname = Str::slug(Str::random(8).$filename).'.'.$image->getClientOriginalExtension();
		// Cargamos la imagen primero en la carpeta de carga, a continuación,
		// obtener hacer una miniatura de la imagen cargada
		$upload = $image->move(Config::get( 'image.upload_folder'),$fullname);
		// Nuestro modelo que hemos creado se llama fotos, esta
		// biblioteca tiene un alias llamado Imagen, no les mezclar dos!
		// Estos parámetros están relacionados con el procesamiento de imágenes
		// clase que hemos incluido, en realidad no relacionado con
		// Laravel
		Image::make(Config::get( 'image.upload_folder').'/'.$fullname)
		->resize(Config::get( 'image.thumb_width'),Config::get( 'image.thumb_height'))->save(Config::get
		( 'image.thumb_folder').'/'.$fullname);
		// Si el archivo está ahora cargado, se muestra un mensaje de error
		// para el usuario, de lo añadimos una nueva columna a la base de datos
		// y mostrar el mensaje de éxito
		if($upload) {
			// imagen está cargado, primero tenemos que añadir la columna
			// para la base de datos
			$insert_id = DB::table('photos')->insertGetId(
			array(
			'title' => Input::get('title'),
			'image' => $fullname
			)
			);
			// Ahora redirigimos al enlace permanente en la imagen:
			return Redirect::to(URL::to('snatch/'.$insert_id))
			->with('success','Your image is uploaded successfully!');
		
		} else {
			// imagen no puede ser cargado
			return Redirect::to('/')->withInput()
			->with('error','Sorry, the image could not be uploaded, please try again later');
		}
	}

*/





	public function getDelete($id){
		$album = Album::find($id);
		$album->delete();
		return Redirect::route('index');
	}

}
