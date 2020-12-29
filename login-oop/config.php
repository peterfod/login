<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'peter');
define('DB_PASS', 'abc123');
define('DB_NAME', 'login');

// $conn = mysqli_connect( DB_SERVER, DB_USER, DB_PASS, DB_NAME );
$conn = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

/* if (mysqli_connect_errno()) {
	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
	exit;
} 
mysqli_set_charset($conn, 'utf8'); */

if ($conn->connect_error) {
  echo 'Failed to connect to MySQL: ' . $conn->connect_error;
  exit();
}
$conn->set_charset('utf8');
?>