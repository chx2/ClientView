<?php

/*
  Autoloader
*/
function load() {
  $classes = glob("includes/classes/*.class.php");
  foreach ($classes as $class) {
    require $class;
  }
}

/*
  Generate a token to submit with forms
*/
function crsf_token() {
  echo '<input type="hidden" name="crsf" value="'.$_SESSION['crsf'].'">';
}

/*
  Generate a CSV file from array
*/
function toCSV($data) {
  $output = fopen("php://output", "wb");
  foreach ($data as $row) {
    fputcsv($output, $row);
  }
  fclose($output);
}

/*
  Minify output buffer
*/
function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

/*
  Global message, can store things like login errors or general page errors
*/
function message($msg) {
  echo "<script>M.toast({html: '$msg'})</script>";
}

/*
  Not logged in, back to the login
*/
function notAllowed() {
  $_SESSION['msg'] = 'You are not logged in';
  $_SESSION['type'] = 'red';
  header('Location: login.php');
}

/*
  Get a view file, these files are crucial and make the base html structure to any page
*/
function view($template) {
  //Access global variables
  global $title;
  global $data;
  global $pagination;
  global $records;
  include 'views/'.$template.'.php';
}

/*
  Like a view file, but isn't crucial to the html structure, use for modals and modular static html data
*/
function block($template) {
  //Access globals except for any GET or POST data
  include 'views/blocks/'.$template.'.php';
}
