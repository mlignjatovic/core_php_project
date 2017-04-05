<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';


Router::load('routes.php')
		->getPage(Request::uri(), Request::requestType());