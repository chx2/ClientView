<?php
/*
  If the install file exists, call app.php to run the installation
  script as well as calling install template afterwards to proceed
  to registration
*/
if (file_exists('install.txt')) {
  $title = 'Installation';
  require('includes/app.php');
  view('header');
    include('install/install.php');
  view('footer');
}
else {
  header('Location: login.php');
}
