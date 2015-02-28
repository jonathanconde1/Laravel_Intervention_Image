<?php

class ImageController extends BaseController{
	public function getForm($id){
		$album = Album::find($id);
		return View::make('tpl.addimage')
		->with('album',$album);
	}

	public function postAdd(){
		$rules = array(
		'album_id' => 'required|numeric|exists:albums,id',
		'image'=>'required|image'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('add_image',array('id' =>
			Input::get('album_id')))
			->withErrors($validator)
			->withInput();
		}
	
		$file = Input::file('image');
		$random_name = str_random(8);
		$destinationPath = Config::get( 'image.upload_folder');
		$extension = $file->getClientOriginalExtension();
		$filename=$random_name.'_album_image.'.$extension;
		$uploadSuccess = Input::file('image')->move($destinationPath, $filename);
		
		//aqui uso Intervention Image para modificar la imagen a las dimensiones que se requieran
		Image::make(Config::get( 'image.upload_folder').'/'.$filename)
		->resize(Config::get( 'image.thumb_width'),Config::get( 'image.thumb_height'))->save(Config::get
		( 'image.thumb_folder').'/'.$filename);



		Photo::create(array(
			'description' => Input::get('description'),
			'image' => $filename,
			'album_id'=> Input::get('album_id')
		));
		return Redirect::route('show_album',
		array('id'=>Input::get('album_id')));
	}

	public function getDelete($id){
		$image = Photo::find($id);
		$image->delete();
		return Redirect::route('show_album',
		array('id'=>$image->album_id));
	}


	public function postMove(){
		$rules = array(
			'new_album' => 'required|numeric|exists:albums,id',
			'photo'=>'required|numeric|exists:images,id'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('index');
		}

		$image = Photo::find(Input::get('photo'));
		$image->album_id = Input::get('new_album');
		$image->save();
		return Redirect::route(
			'show_album',
			array('id'=>Input::get('new_album'))
		);
	}


}
