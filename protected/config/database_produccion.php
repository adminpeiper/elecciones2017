<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=elecciones2017pc',
	'emulatePrepare' => true,
	'username' => 'adminE17',
	'password' => 'admin2017',
	'charset' => 'utf8',
	
);