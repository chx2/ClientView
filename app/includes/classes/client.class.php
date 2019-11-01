<?php
class Client {

  protected $action;
  protected $data;
  protected $field;

  protected $filesize;
  protected $db;

  public function __construct($data = true) {
    if ($data) {
      $this->data = array_map('htmlspecialchars',filter_input_array(INPUT_POST));
      if (isset($this->data['action'])) {
        $keys = array_keys($this->data);
        $this->field = $keys[1];
      }
      else {
        $this->action = end($this->data) ?: '';
    		array_pop($this->data);
      }
    }

    $config = parse_ini_file(realpath('includes/config.ini'));

    $this->filesize = $config['filesize'];
    $this->db = new db(
      $config['host'],
      $config['username'],
      $config['password'],
      $config['db']
    );
  }

  public function count() {
    $count = $this->db->query('SELECT COUNT(*) as count FROM client')->fetchArray();
    return $count['count'];
  }

  public function serve() {
    $function = $this->action;
    call_user_func(array($this,$function));
  }

  public function quickEdit() {
    if ($this->data['action'] == 'edit') {
      $this->db->query('UPDATE client SET '.$this->field.' = ? WHERE id = ?',$this->data[$this->field],$this->data['id']);
    }
    else if ($this->data['action'] == 'delete') {
      $this->db->query('DELETE FROM client WHERE id = ?',$this->data['id']);
    }
  }

  private function add() {
    $name = $this->data['name'] ?: 'N/A';
    $address = $this->data['address'] ?: 'N/A';
    $company = $this->data['company'] ?: 'N/A';
    $ctitle = $this->data['title'] ?: 'N/A';
    $email = $this->data['email'] ?: 'N/A';
    $telephone = $this->data['telephone'] ?: 'N/A';
    $notes = $this->data['notes'] ?: 'N/A';
    $this->db->query('
      INSERT INTO
        client (name,address,company,title,email,telephone,notes)
      VALUES (?,?,?,?,?,?,?)',
      $name,$address,$company,$ctitle,$email,$telephone,$notes
    );
  }

  private function export() {
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=file.csv");
    $clients = $this->db->query('SELECT name,address,company,title,email,telephone,notes FROM client')->fetchAll();
    toCSV($clients);
  }

  private function import() {
    if (isset($_FILES['file'])) {
      $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
      if(in_array($_FILES['file']['type'],$mimes)){
        $file = $_FILES['file']['tmp_name'];
        if ($_FILES['file']['size'] > $this->filesize) {
          echo 'Error, max filesize has exceeded application limit of '. $this->filesize / 1000  .'KB';
        }
        else {
          $file = array_map('str_getcsv', file($file));
          foreach($file as $entry) {
            $this->db->query('
              INSERT INTO
                client (name,address,company,title,email,telephone,notes)
              VALUES (?,?,?,?,?,?,?)',
              $entry[0],$entry[1],$entry[2],$entry[3],$entry[4],$entry[5],$entry[6]
            );
          }
          echo 'Upload complete';
        }
      }
      else {
        echo 'Error, uploaded file is not in valid CSV format';
      }
    }
    else {
      echo 'No files received';
    }
  }

  private function login() {
    $email = $this->data['email'];
    $password = $this->data['password'];
    $sql = $this->db->query('
      SELECT
        email,
        password
      FROM
        users
      WHERE
        email = ?',
      $email
    )->fetchArray();
    if (password_verify($password,$sql['password']) && $email === $sql['email']) {
      $_SESSION['user'] = $email;
      $_SESSION['msg'] = 'Welcome!';
      $_SESSION['type'] = 'green';
      header('Location: dashboard.php');
    }
    else {
      $_SESSION['msg'] = 'Incorrect Login';
      $_SESSION['type'] = 'red';
      header('Location: login.php');
    }
  }

  private function register() {
    $email = $this->data['email'];
    $password = password_hash($this->data['password'], PASSWORD_DEFAULT);
    $this->db->query('
      INSERT INTO
        users (email,password)
      VALUES
        (?,?)',
      $email,$password
    );
    $_SESSION['msg'] = 'Your account has been created!';
    $_SESSION['type'] = 'green';
    @unlink(__DIR__ . '/../../install.txt');
    @unlink(__DIR__ . '/../../register.php');
    header('Location: login.php');
  }

  private function search() {
    $name = $this->data['name'] ?: 'N/A';
    $name = "'%".$name."%'";
    $client = $this->db->query('
      SELECT
        id,
        name
      FROM
        client
      WHERE
        name
      LIKE
        '.$name.'
      LIMIT 11'
    )->fetchAll();
    echo json_encode($client);
  }

  private function update() {
    $id = $this->data['id'];
    $name = $this->data['name'] ?: 'N/A';
    $address = $this->data['address'] ?: 'N/A';
    $company = $this->data['company'] ?: 'N/A';
    $ctitle = $this->data['title'] ?: 'N/A';
    $email = $this->data['email'] ?: 'N/A';
    $telephone = $this->data['telephone'] ?: 'N/A';
    $notes = $this->data['notes'] ?: 'N/A';
    $this->db->query('
      UPDATE
        client
      SET
        name = ?,
        address = ?,
        company = ?,
        title = ?,
        email = ?,
        telephone = ?,
        notes = ?
      WHERE
        id = ?',
      $name,$address,$company,$ctitle,$email,$telephone,$notes,$id
    );

    $_SESSION['msg'] = $name."'s information has been updated!";
    $_SESSION['type'] = 'green';
    header('Location: dashboard.php');
  }

}
