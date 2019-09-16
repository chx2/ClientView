<div class="row">
  <form action="process.php" method="POST" class="login-form">
    <div class="card">
      <div class="card-content center-align">
        <img src="assets/images/logo.png">
        <div class="row">
          <?=isset($_SESSION['msg'],$_SESSION['type']) ? '<div class="card-panel white-text center-align '.$_SESSION['type'].'">'.$_SESSION['msg'].'</div>' : '';?>
          <div class="input-field col s12 m6">
            <input id="email" type="email" name="email" class="validate" required>
            <label for="email">Email</label>
          </div>
          <div class="input-field col s12 m6">
            <input id="password" type="password" name="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
        <?php crsf_token();?>
        <input type="hidden" name="options" value="login">
        <button style="width:100%" class="btn waves-effect waves-light" type="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  </form>
</div>
