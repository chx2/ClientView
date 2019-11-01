<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-header center-align">
          <img class="responsive-img" src="assets/images/logo.png" alt="body-banner">
        </div>
        <div class="card-content">
          <?=isset($_SESSION['msg'],$_SESSION['type']) ? '<div class="card-panel white-text center-align '.$_SESSION['type'].'">'.$_SESSION['msg'].'</div>' : '';?>
          <ul class="collection">
            <a title="Search for a client" href="#" class="openuser">
              <li class="collection-item avatar">
                <i class="material-icons circle blue">add</i>
                <span class="title">Add a new client</span>
                <p>Add a new client to the database</p>
              </li>
            </a>
            <a title="Import CSV" href="#" class="import">
              <li class="collection-item avatar">
                <i class="material-icons circle orange">
                cloud_upload
                </i>
                <span class="title">Import</span>
                <p>Import Clients from CSV</p>
              </li>
            </a>
            <a <?=($records < 1) ? 'class="disabled"' : ''?> title="Export to CSV" href="#" class="export">
              <li class="collection-item avatar <?=($records < 1) ? 'grey' : ''?>">
                <i class="material-icons circle green">insert_chart</i>
                <span class="title">Export</span>
                <p><?=($records < 1) ? 'You need clients to use this feature' : 'Export current client records to CSV'?></p>
              </li>
            </a>
            <a <?=($records < 1) ? 'class="disabled"' : ''?> title="Search for a client" href="#" class="opensearch">
              <li class="collection-item avatar <?=($records < 1) ? 'grey' : ''?>">
                <i class="material-icons circle">search</i>
                <span class="title">Search for a client</span>
                <p><?=($records < 1) ? 'You need clients to use this feature' : 'Search for a specific client record to review'?></p>
              </li>
            </a>
            <a <?=($records < 1) ? 'class="disabled"' : ''?> title="Edit Records" href="view.php">
              <li class="collection-item avatar <?=($records < 1) ? 'grey' : ''?>">
                <i class="material-icons circle red">border_color</i>
                <span class="title">Edit Records</span>

                <p><?=($records < 1) ? 'You need clients to use this feature' : 'View master spreadsheet to edit records individually'?></p>
              </li>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
