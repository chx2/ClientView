<?php
/*
  Client View Logout Script
*/
require_once('includes/app.php');
session_destroy();
header('Location: login.php');
