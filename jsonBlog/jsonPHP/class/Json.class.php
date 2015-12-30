<?php

class Json{

	/**
		get string from file
	*/
	static function get($topic){
		return file_get_contents( 'data/menu/' . $topic . '.json');
	}
	
	
	/**
		set string to file//todo
	*/
	static function set($arr,$file){
		file_put_contents( 'data/menu/' . $file . '.json', json_encode($arr) );
	}
	
	/**
		string to json//todo
	*/
	static function obj($topic){
		return file_get_contents( 'data/' . $topic . '.json');
	}


}