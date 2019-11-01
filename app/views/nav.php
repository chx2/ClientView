<nav>
  <div class="nav-wrapper">
    <a href="dashboard.php" class="brand-logo"><img class="responsive-img" src="assets/images/logo.png" alt="logo"></a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down right">
        <li><a title="Add a new client"  class="openuser"><i class="large material-icons">add</i></a></li>
        <?php if($records >= 1):?><li><a title="Search for a client" class="opensearch"><i class="material-icons prefix">search</i></a></a></li><?php endif;?>
        <?php if($records >= 1):?><li><a title="Edit Records"  href="view.php"><i class="large material-icons">border_color</i></a></li><?php endif;?>
        <li><a title="Log Out" href="logout.php"><i class="large material-icons">power_settings_new</i></a></li>
      </ul>
  </div>
</nav>

<ul class="sidenav center-align" id="mobile-demo">
  <li><a style="padding:0;margin-bottom:160px;" href="dashboard.php"><img class="responsive-img" src="assets/images/logo.png" alt="sidebar-logo"></a></li>
  <li><a title="Import CSV" href="#" class="import">Import Records</a></li>
  <?php if($records >= 1):?><li><a title="Export to CSV" href="#" class="export">Export Records</a></li><?php endif;?>
  <li><a title="Add a new client" href="#" class="openuser">Add a new Client</a></li>
  <?php if($records >= 1):?><li><a title="Search for a client" href="#" class="opensearch">Search for a client</a></li><?php endif;?>
  <?php if($records >= 1):?><li><a title="Edit Records"  href="view.php">Edit Records</a></li><?php endif;?>
  <li><a title="Log Out" href="logout.php">Log Out</a></li>
</ul>
