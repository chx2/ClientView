    <!--JAVASCRIPT-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/materialize.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/table.min.js"></script>
    <script>
    if ($('.table').length > 0) {
      $('.table').Tabledit({
        url: 'view.php',
        eventType: 'dblclick',
        editButton: false,
        restoreButton: false,
        dangerClass: 'grey white-text',
        buttons: {
            delete: {
                class: 'btn red',
                html: '<i class="material-icons">delete</i>',
                action: 'delete'
            },
            confirm: {
                class: 'btn red darken-4',
                html: '<i class="material-icons">check_box</i>'
            }
        },
        columns: {
          identifier: [0, 'id'],
          editable: [[1, 'name'], [2, 'address'],[3, 'company'],[4, 'title'], [5,'email'],[6, 'telephone']]
        },
        onAjax: function (action, serialize) {
          if (action === 'edit') {
            M.toast({html: 'Row has been edited!', classes: 'green'});
          }
          else {
            M.toast({html: 'Row has been deleted', classes: 'red'});
          }
        },
      });
    }
    </script>
  </body>
</html>

<?php
ob_end_flush();
//Clear any messages when page served
unset($_SESSION['msg']);
unset($_SESSION['type']);
?>
