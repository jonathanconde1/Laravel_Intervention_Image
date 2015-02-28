<?php

class Image extends Eloquent {
protected $table = 'images';
protected $fillable = array('album_id','description','image');


//aqui declaro las reglas para las imagenes
public static $upload_rules = array(
'title'=> 'required|min:3',
'image'=> 'required|image'
);

}
