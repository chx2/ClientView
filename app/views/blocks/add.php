<!-- Modal Structure -->
<div id="user" class="modal">
  <div class="modal-header center-align">
    <h5>Add a new Client</h5>
  </div>
  <form class="user">
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">account_box</i>
          <input placeholder="Enter Client Name..." id="name" name="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">business</i>
          <input placeholder="Enter Client Address..." id="address" name="address" type="text" class="validate">
          <label for="address">Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">business_center</i>
          <input placeholder="Enter Company Name..." id="company" name="company" type="text" class="validate">
          <label for="name">Company</label>
        </div>
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">supervisor_account</i>
          <input placeholder="Enter Company Title..." id="title" name="title" type="text" class="validate">
          <label for="address">Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">email</i>
          <input placeholder="Enter Client Email..." id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12 m6">
          <i class="material-icons prefix">phone</i>
          <input placeholder="Enter Client Phone..." id="telephone" name="telephone" type="tel" class="validate">
          <label for="telephone">Telephone</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea placeholder="Enter any additional client information here..." id="notes" name="notes" class="materialize-textarea"></textarea>
          <label for="notes">User Information</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <button style="width:100%" class="btn waves-effect waves-light" type="submit">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
    <input type="hidden" name="options" value="add">
  </form>
</div>
