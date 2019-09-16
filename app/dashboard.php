<?php

  /*
    Client View Dashboard Script

    This serves as the home screen once a user has logged in
  */
  
  $title = 'Dashboard';
  require_once('includes/app.php');

  if (isset($_SESSION['user'])) {

    view('header');
      block('nav');
    view('dashboard');
      block('add');
      block('search');
      block('searchbar');
    view('footer');

  }
  else {
    notAllowed();
  }
