<?php
class Album extends Eloquent {
	protected $table = 'albums';
	protected $fillable = array('name','description','cover_image');

	public function Photos(){
		return $this->hasMany('Photo','album_id');
	}
}
