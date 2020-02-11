<?php
  define('db_hostname', 'database-1.c0pt40lcpl02.us-east-1.rds.amazonaws.com');
  define('db_username', 'admin');
  define('db_password', 'wearein4910');
  define('db_name', 'main');
  $db = mysqli_connect(db_hostname, db_username, db_password, db_name);

  if(!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  $input_user = $_POST['username'];
  $input_pwd = $_POST['pwd'];

  $query = "SELECT username FROM user WHERE EXISTS (SELECT username FROM WHERE '$input_user' = username AND '$input_pwd' = pass;");
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) == 1) {
    header("location: profile.php");
    exit;
  }
  else {
    echo "Incorrect username or password.";
  }
?>
