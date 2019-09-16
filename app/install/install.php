<div class="container">
  <div class="card login-form">
    <div class="card-content">
      <h2>Requirements</h2>
      <div class="row">
        <div class="input-field col s12 m6">
          Requires PHP 7+
        </div>
        <div class="input-field col s12 m6">
          <?=isset($phperror) ? '<p class="red-text">'.$phperror.'</p>' : '<p class="green-text">Running version '.$php.'</p>'?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6">
          Requires MySQL
        </div>
        <div class="input-field col s12 m6">
          <?=isset($mysqlerror) ? '<p class="red-text">'.$mysqlerror.'</p>' : '<p class="green-text">MySQL connection complete<br>Running '.$version['vnum'].'</p>'?>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6">
          Sessions are enabled
        </div>
        <div class="input-field col s12 m6">
          <?=isset($sessionerror) ? '<p class="red-text">'.$sessionerror.'</p>' : '<p class="green-text">Sessions are enabled</p>'?>
        </div>
      </div>
      <a style="width:100%" class="btn waves-effect waves-light <?=($error) ? 'disabled' : ''?>" href="register.php">Continue to registration</a>
    </div>
  </div>
</div>
