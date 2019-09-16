<?php

/*
  General script to handle ajax & POST requests, Client Class will grab the required post data
*/

require_once('includes/app.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //CRSF Validation
  if (!empty($_POST['token'])) {
    if (!hash_equals($_SESSION['crsf'], $_POST['crsf'])) {
      header('Location: 403');
    }
  }

  //Call client class to handle interactions
  (new Client())->serve();

}
else {
  die('No request received');
}
