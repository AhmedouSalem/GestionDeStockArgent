




<?php 

require_once('connection.php');

session_start();

error_reporting(0);

if (isset($_SESSION['UName'])) {
    header("Location: projet.php");
}

if (isset($_POST['Login'])) {
  $email = $_POST['UName'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM employee WHERE UName='$email' AND Pass='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['UName'];
    header("Location: projet.php");
  } else {
    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
  }
}

?>