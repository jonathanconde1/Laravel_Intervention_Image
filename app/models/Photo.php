<?php
class Photo extends Eloquent {
protected $table = 'images';
protected $fillable = array('album_id','description','image');


/*
//the variable that sets the table name
protected $table = 'photos';
//the variable that sets which columns can be edited
protected $fillable = array('title','image');
//The variable which enables or disables the Laravel's
//timestamps option. Default is true. We're leaving this here
//anyways
public $timestamps = true;
*/

//rules of the image upload form
public static $upload_rules = array(

	'name' => 'required',
	'cover_image'=>'required|image'
);



}
