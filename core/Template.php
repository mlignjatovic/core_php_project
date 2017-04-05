<?php

class Template {

	public static function view ($file,$data) {

		if (file_exists("Ui/layout/{$file}.php")) {
			extract($data);
			return require "Ui/layout/{$file}.php";
		}
		
	}
}