<?php
include 'config.php';

$sql = "select * from users where email = '$_SESSION[user_email]'";
// $result = mysqli_query($conn, $sql);
$result = $conn->query($sql);
//$row = mysqli_fetch_assoc($result);
$row = $result->fetch_assoc();
$session_email = $_SESSION['user_email'];
$session_first = $row['first_name'];
$session_last = $row['last_name'];
$session_reg =  $row['reg_date'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $first = mysqli_real_escape_string($conn, $_POST['first']);
  $first = $conn->real_escape_string($_POST['first']);
  // $last = mysqli_real_escape_string($conn, $_POST['last']);
  $last = $conn->real_escape_string($_POST['last']);
  if ($first != '' && $last != '') {
    $sql = "UPDATE users SET first_name='$first', last_name='$last' WHERE email='$session_email'";
    // mysqli_query($conn, $sql);
    $conn->query($sql);
    $session_first = $first;
    $session_last = $last;
  } else {
    $error = 'Minden mezőt kötelező kitölteni!';
  }
}


if (!isset($_SESSION['user_email'])) {
  header("Location: index.php?page=login");
}
?>
<div class="user">
  <h4>Felhasználói fiók</h4>
  <form method="post">
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-9">
        <?php echo "<input class='form-control' type='text' id='staticEmail' value=$session_email readonly>"; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="last_name" class="col-sm-3 col-form-label">Vezetéknév</label>
      <div class="col-sm-9">
        <?php echo "<input class='form-control' type='text' name='last' value=$session_last>"; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="first_name" class="col-sm-3 col-form-label">Utónév</label>
      <div class="col-sm-9" padding: 30px 0px;>
        <?php echo "<input class='form-control' type='text' name='first' value=$session_first>"; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="reg_date" class="col-sm-3 col-form-label">Regisztráció ideje</label>
      <div class="col-sm-9">
        <?php echo "<input class='form-control' type='text' value=$session_reg readonly>"; ?>
      </div>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Módosítás</button>
    </div>
  </form>
  <br>
  <!-- <h4>Jelszó megváltoztatása</h4>
  <form method="post">
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Régi jelszó</label>
      <div class="col-sm-9">
        <input class="form-control" type="password" id="inputPassword">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Új jelszó</label>
      <div class="col-sm-9">
        <input class="form-control" type="password" id="inputPassword">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Új jelszó újra</label>
      <div class="col-sm-9">
        <input class="form-control" type="password" id="inputPassword">
      </div>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Módosítás</button>
    </div>
  </form>
  <div style="color:#cc0000; margin-top:10px"> -->
    <?php
    if (isset($error)) {
      echo $error;
    }
    ?>
  </div>
</div>