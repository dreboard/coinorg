<?php
class UploadedPic {
	private $field_name = '';
	// $field_name is the name of the input in uploading form
	public function __construct($field_name) {
		$this -> field_name = $field_name;
	}
	// $path is the path to the directory where
	// the uploaded file you want stored.
	// $primary_name is the primary part of the
	// file name you want the new name of the uploaded file to be
	// such as 'song' with 'song.mp3'. The extensions part of the
	// new name will be determined from that of the uploaded one.
	public function getFileName($path, $primary_name = '') {
		if (empty($path)) {
			return false;
		}
		if (empty($primary_name)) {
			// Use microtime() as temporary file name if no $primary_name is given
			$primary_name = microtime();
		}
		if (is_uploaded_file($_FILES[$this -> field_name]['tmp_name'])) {
			$client_name = basename($_FILES[$this -> field_name]['name']);
			//$ext = substr($client_name, strrpos($client_name, '.'));
			//$server_name = $primary_name.$ext;
			$server_name = $primary_name;
			if (file_exists($path.$server_name)) {
				// deleting any existing files with the same name here
				// so that the old file can be updated this way.
				unlink($path.$server_name);
			}
			if (move_uploaded_file($_FILES[$this -> field_name]['tmp_name'], $path.$server_name)) {
				// The new name of the uploaded file will be returned
				// for access and retrieval of it.
				return $server_name;
			}
		}
		return false;
	}
}
