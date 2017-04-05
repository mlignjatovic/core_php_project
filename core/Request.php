<?php

class Request {
	//get current URL and parse url
	public static function uri() {

		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/');
	}
	//check which type of request is sent
	public static function requestType() {

		return $_SERVER['REQUEST_METHOD'];
	}
}