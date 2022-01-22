<!-- Ahmedou Salem-->
<?php 

require_once('connection.php');

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: projet.php");
}


if (isset($_POST['Login'])) {
  $UName = $_POST['UName'];
  $Password = md5($_POST['Password']);

$sql = "SELECT * FROM users WHERE email='$UName' AND password='$Password'";  
$result = mysqli_query($con, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: projet.php");
  } 
  else {
    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    
  }
}

?>

<!DOCTYPE html>
<html lang="ar" dir='rtl'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="etab.css">
    <title>تسجيل الدخول</title>
</head>
<body >
  <table cellspacing="0">
    <tr>
      <th ><h1>تحويل الأموال</h1></th>
    </tr>
    <tr>
      <td>

    <div class="container">
        
                        <h3>تسجيل الدخول</h3>
                    
                    
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input type="email" name="UName" placeholder=" الإسم" value="<?php echo $UName; ?>" class="form-control mb-3">
                            <input type="password" name="Password" placeholder="كلمة السر" value="<?php echo $_POST['Password']; ?>"class="form-control mb-3" id="motdepasse"><input type="checkbox" onclick="Afficher()">
                            <button class="btn btn-success mt-3" name="Login">تسجيل الدخول</button><br>
                           
                        </form>
                   
    </div>
    </td>
  </tr>
  <tr>
    <td>
        <a href="register.php"><button style="width: 20%; background-color: blue;">إنشاء حساب</button></a>
    </td>
  </tr>
    </table>
    <script>
function Afficher()
{ 
var input = document.getElementById("motdepasse"); 
if (input.type === "password")
{ 
input.type = "text"; 
} 
else
{ 
input.type = "password"; 
} 
} 
</script>

</body>
</html>
