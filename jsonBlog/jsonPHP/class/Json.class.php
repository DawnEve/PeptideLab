<?php

class Json{

	/**
		get string from file
	*/
	static function get($topic){
		return file_get_contents( 'data/' . $topic . '.json');
	}
	
	
	/**
		set string to file
	*/
	static function set($arr,$file){
		file_put_contents($file, json_encode($arr) );
	}
	
	/**
		string to json
	*/
	static function obj($topic){
		return file_get_contents( 'data/' . $topic . '.json');
	}


}