<?php
/*
  Installation Script
  This part of the script gathers runtime requirements
*/

$config = parse_ini_file(realpath("includes/config.ini"));

$error = false;

//Require PHP7
$php = phpversion();
if ($php < 7) {
  $error = true;
  $phperror = 'This application requires PHP 7+ to run';
}

//Require
$conn = @mysqli_connect($config['host'], $config['username'], $config['password']);
if(!$conn) {
  $error=true;
  $mysqlerror = 'A connection could not be establish, check config.ini if username and password are incorrect';
}
mysqli_close($conn);

//Working session
$_SESSION['test'] = 1;
if(empty($_SESSION['test'])) {
  $error=true;
  $sessionerror = 'Unable to create session, make sure your server is configured to create session variables';
}

// Create temp connection
$tmpdb = new db($config['host'], $config['username'], $config['password']);

//Get MySQL version
$version = $tmpdb->query('SELECT version() as vnum')->fetchArray();

//Create database
$tmpdb->query('CREATE DATABASE IF NOT EXISTS '.$config['db']);

//Recreate temp connection with database, create tables
$tmpdb = new db($config['host'], $config['username'], $config['password'], $config['db']);

//Client Table
$sql = 'CREATE TABLE IF NOT EXISTS client (
  id int(8) NOT NULL AUTO_INCREMENT,
  name varchar(64) NOT NULL,
  address varchar(64) NOT NULL,
  company varchar(64) NOT NULL,
  title varchar(64) NOT NULL,
  email varchar(64) NOT NULL,
  telephone varchar(32) NOT NULL,
  notes text NOT NULL,
  PRIMARY KEY (id),
  KEY name (name)
)ENGINE=InnoDB CHARACTER SET utf8';
$tmpdb->query($sql);

//User Table
$sql = 'CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(64) NOT NULL,
  password blob NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB CHARACTER SET utf8;';
$tmpdb->query($sql);
