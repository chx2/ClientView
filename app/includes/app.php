<?php

/*
  ClientView by Chris H.
  Developed as a alternate to using a spreadsheet to keeping track of clients

  This file is called on every page & serves as a boilerplate for the application
*/

//Global Functions
require 'functions.php';

spl_autoload_register('load');

//Start session
session_start();
if (empty($_SESSION['crsf'])) {
  $_SESSION['crsf'] = bin2hex(random_bytes(32));
}

//Start the buffer
ob_start("sanitize_output");

/*
  Installation
  The following code is ran for first-time use
*/
if (file_exists('install.txt')) {
  if (empty($_POST)) {
    //Run installation script
    require 'install/install_run.php';
  }
}
else {
  //We want all the clients so we set to false since we aren't passing individuals
  $clients = new Client(false);
  $records = $clients->count();
}
