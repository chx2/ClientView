$(document).ready(function(){

  //Preloader
  var path = window.location.pathname;
  var end = path.split("/");
  if(end[end.length-1] == 'dashboard') {
    $('.cover').fadeOut(2000);
  }
  else {
    $('.cover').fadeOut();
  }

  //Materialize Init
  M.AutoInit();

  //Sidenav
  $('.sidenav').sidenav();

  //Init Modals
  $('.modal').modal();

  //Turn off disabled elements
  $('.disabled').click(false);

  //Open new user
  $('.openuser').on('click', function (e) {
    e.preventDefault();
    $('#user').modal('open').find('input').eq(0).focus();
  });

  //New user
  $('.user').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'process.php',
      data: $('.user').serialize(),
      success: function () {
        M.toast({html: 'New user has been added!', classes: 'green'});
        $('#user').modal('close');
      }
    });
  });

  //Open user search
  $('.opensearch').on('click', function (e) {
    e.preventDefault();
    $('#searchbar').modal('open').find('input').eq(0).focus();
  });

  //Search user
  $('.names').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'process.php',
      data: $('.names').serialize(),
      dataType: 'json',
      success: function (data) {
        var count = 0;
        var users = $('.results');
        $('#searchbar').modal('close');
        users.html('');
        users.append('<li class="collection-header"><h4>Client Results</h4></li>');
        if (data.length > 0) {
          $.each(data, function(i, item) {
            if (count < 11) {
              users.append('<a href="view.php?id=' + data[i].id + '"><li class="collection-item"><div>' + data[i].name + '<i class="material-icons secondary-content">send</i></div></li></a>')
            }
            count++;
          });
          if (count < 11) {
            M.toast({html: count + ' results found', classes: 'green'});
          }
          else {
            M.toast({html: '10+ results found', classes: 'green'});
          }
        }
        else {
          users.append('<li class="collection-item"><div>Nothing Found<i class="material-icons secondary-content red-text">warning</i></div></li></a>');
          M.toast({html: count + ' results found', classes: 'red'});
        }
        $('#searchuser').modal('open');
      }
    });
  });

  //Open import menu
  $('.import').on('click', function(e) {
    $('#import').modal('open').find('input').eq(0).focus();
  });

  //Send input csv data
  $('.importdata').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'process.php',
      data: new FormData($('.importdata')[0]),
      cache: false,
      contentType: false,
      processData: false,
      success: function (e) {
        M.toast({html: e, classes: 'orange'});
        $('#import').modal('close');
      }
    });
  });

  //Export CSV
  $('.export').on('click', function (e) {

    e.preventDefault();

    M.toast({html: 'Preparing...', classes: 'green'});

    $.ajax({
      type: 'post',
      url: 'process.php',
      data: "options=export",
      xhrFields: {
          responseType: 'blob'
      },
      success: function (data) {
          var a = document.createElement('a');
          var url = window.URL.createObjectURL(data);
          a.href = url;
          a.download = 'Clients.CSV';
          document.body.append(a);
          a.click();
          a.remove();
          window.URL.revokeObjectURL(url);
          M.toast({html: 'Client Database has been exported!', classes: 'green'});
      }
    });
  });
});
