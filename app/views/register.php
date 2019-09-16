<div class="row">
  <form action="process.php" method="POST" class="login-form">
    <div class="card">
      <div class="card-content center-align">
        <img src="assets/images/logo.png">
        <div class="row">
          <div class="card-panel white-text green center-align">Welcome to ClientView, please enter an email and password to use</div>
          <div class="input-field col s6">
            <input id="email" type="email" name="email" class="validate" required>
            <label for="email">Email</label>
          </div>
          <div class="input-field col s6">
            <input id="password" type="password" name="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
        <input type="hidden" name="options" value="register">
        <button style="width:100%" class="btn waves-effect waves-light" type="submit">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  </form>
</div>
