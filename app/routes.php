<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('prueba');
});
*/


Route::get('/', array('as' => 'index','uses' => 'AlbumsController@getList'));
Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));

Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
//ruta para editar la foto del album
Route::get('/editAlbum/{id}', array('as' => 'editar_album','uses' => 'AlbumsController@getAlbumEditar'));
Route::post('/editAlbum', array('as' => 'editar_album_post','uses' => 'AlbumsController@postAlbumEditar'));

Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImageController@postAdd'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImageController@getDelete'));

Route::post('/moveimage', array('as' => 'move_image', 'uses' =>'ImageController@postMove'));




//nota para comprimir la foto se puede utilizar save - quality


//This is for the get event of the index page

//Route::get('/',array('as'=>'index_page','uses'=> 'ImageController@getIndex'));
//This is for the post event of the index.page
//Route::post('/',array('as'=>'index_page_post','before' =>'csrf', 'uses'=>'ImageController@postIndex'));

//This is to show the image's permalink on our website
Route::get('snatch/{id}',array('as'=>'get_image_information',
	'uses'=>'ImageController@getSnatch'))->where('id', '[0-9]+');

