<!-- Modal Structure -->
<div id="searchbar" class="modal">
  <div class="modal-header center-align">
    <h5>Search for a client</h5>
  </div>
  <form class="names" action="process.php" method="post">
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" placeholder="Find a client..." name="name">
          <input type="hidden" name="options" value="search">
        </div>
      </div>
    </div>
  </form>
</div>
