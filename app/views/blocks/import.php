<!-- Modal Structure -->
<div id="import" class="modal">
  <div class="modal-header center-align">
    <h5>Import Clients from CSV</h5>
  </div>
  <form class="importdata">
    <div class="modal-content">
      <div class="row">
        <h5 class="center-align">Include all on each line, in order:</h5>
        <div class="input-field col m6" style="margin-top:2rem">
          <div class="file-field input-field">
            <div class="btn">
              <i class="material-icons">add</i>
              <input type="file" name="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
        <div class="col m6">
          <ol>
            <li>Name</li>
            <li>Address</li>
            <li>Company</li>
            <li>Title</li>
            <li>E-Mail</li>
            <li>Telephone</li>
            <li>Notes</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <button style="width:100%" class="btn waves-effect waves-light" type="submit">Upload
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
    <input type="hidden" name="options" value="import">
  </form>
</div>
