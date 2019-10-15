<?php
/*
  Client View View Script
  This page can be handled as

  1. Viewing and editing single user at a time
  2. Table edit of up to 10 users at a time

  POST and GET is handled here instead of process.php due to the submission nature of tableedit.js
  This may change in the future
*/
  $title = 'View User';
  require_once('includes/app.php');
  //If logged in...
  if (isset($_SESSION['user'])) {

    //Handling for live table editing, done here to avoid confusion with other ajax code
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      (new Client())->quickEdit();

    }

    else {

      //Get variables, pass dummy value if nothing exists
      $single = $_GET['id'] ?? false;
      $curpage = $_GET['page'] ?? 1;
      $page = new Paginator($records,$curpage);

      //Individual record edit
      if ($single) {
        $data = $page->getUser($single);
      }

      //Table edit, prepare pagination
      else {

        //Generate paginated results
        $pagination = $page->paginate();
        $data = $page->offset()->getAll();

      }

      view('header');
        block('nav');
        //Edit specific user record
        if ($single):
          view('viewuser');
        else:
          view('viewall');
        endif;
        block('add');
        block('search');
        block('searchbar');
      view('footer');

    }

  }

  else {
    notAllowed();
  }
