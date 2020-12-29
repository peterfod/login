<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Login system</title>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="?page=home">Home</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="index.php?page=conn_test">MySQL teszt</a>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
            echo "<div class='navbar-nav'>";
            if (!isset($_SESSION['user_email'])) {
              echo "<a class='nav-link' href='index.php?page=register'>Regisztráció</a>";
              echo "<a class='nav-link' href='index.php?page=login'>Belépés</a>";
            } else {
              echo "<a class='nav-link' href='index.php?page=profile'>Profil</a>";
              echo "<a class='nav-link' href='index.php?page=logout'>Kilépés</a>";
            }
            echo "</div>";
            ?>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-md-12">
        <?php
        if (!isset($_GET['page'])) {
          include 'home.php';
        } else {
          $page = $_GET['page'];
          switch ($page) {
            case 'conn_test':
              include 'conn_test.php';
              break;
            case 'login':
              include 'login.php';
              break;
            case 'logout':
              include 'logout.php';
              break;
            case 'profile':
              include 'profile.php';
              break;
            case 'register':
              include 'register.php';
              break;              
            default:
              include 'home.php';
              break;
          }
        }
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 footer">
        &copy; Copyright 2020
      </div>
    </div>
  </div>


</body>

</html>