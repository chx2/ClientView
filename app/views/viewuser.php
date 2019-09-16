<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-header center-align">
          <h1 class="center-align"><?=$data['name']?></h1>
        </div>
        <div class="card-content">
          <?php if ($data):?>
            <form action="process.php" method="post">
              <div class="modal-content">
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_box</i>
                    <input placeholder="Enter Client Name..." id="name" name="name" type="text" class="validate" value="<?=$data['name']?>">
                    <label for="name">Name</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">business</i>
                    <input placeholder="Enter Client Address..." id="address" name="address" type="text" class="validate" value="<?=$data['address']?>">
                    <label for="address">Address</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">business_center</i>
                    <input placeholder="Enter Client Company..." id="company" name="company" type="text" class="validate" value="<?=$data['company']?>">
                    <label for="name">Company</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input placeholder="Enter Company Role..." id="title" name="title" type="text" class="validate" value="<?=$data['title']?>">
                    <label for="address">Title</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input placeholder="Enter Client Email..." id="email" type="email" name="email" class="validate" value="<?=$data['email']?>">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input placeholder="Enter Client Phone..." id="telephone" name="telephone" type="tel" class="validate" value="<?=$data['telephone']?>">
                    <label for="telephone">Telephone</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea placeholder="Enter any additional client information here..." id="notes" name="notes" class="materialize-textarea"><?=$data['notes']?></textarea>
                    <label for="notes">User Information</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <button style="width:100%" class="btn waves-effect waves-light" type="submit">Update
                      <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
              </div>
              <input type="hidden" name="id" value="<?=$data['id']?>">
              <input type="hidden" name="options" value="update">
            </form>
          <?php else:?>
            <h1>No data was found...</h1>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
