<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-header center-align">
          <img class="responsive-img" src="assets/images/logo.png">
        </div>
        <div class="card-content">
          <table class="table highlight responsive-table">
            <thead>
              <tr>
                <th style="display:none">id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Company</th>
                <th>Title</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Notes</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $value):?>
                <tr>
                  <td style="display:none"><?=$value['id']?></td>
                  <td><?=$value['name']?></td>
                  <td><?=$value['address']?></td>
                  <td><?=$value['company']?></td>
                  <td><?=$value['title']?></td>
                  <td><?=$value['email']?></td>
                  <td><?=$value['telephone']?></td>
                  <td><a href="view.php?id=<?=$value['id']?>">View</a></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <?=$pagination?>
        </div>
      </div>
    </div>
  </div>
</div>
