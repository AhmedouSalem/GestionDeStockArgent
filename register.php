<?php 

include 'connection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('رائع! إكتمل تسجسل المستخدم.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('خطأ! هناك شيء خاطئ.')</script>";
			}
		} else {
			echo "<script>alert('خطأ البريد الإلكتروني موجود بالفعل.')</script>";
		}
		
	} else {
		echo "<script>alert('كلمة المرور غير متطابقة')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="etab.css">
    <title>Login Form in PHP With Session</title>
</head>
<body >

	<div class="container">

        
		<form action="" method="POST" class="login-email">
            
                        <h3 class="text-center py-3">إنشاء حساب </h3>
                    
			
				<input type="text" placeholder="الإسم..." name="username" value="<?php echo $username; ?>" required>
			
				<input type="email" placeholder=" البريد الإلكتروني..." name="email" value="<?php echo $email; ?>" required>
			
				<input type="password" placeholder="كلمة السر" name="password" value="<?php echo $_POST['password']; ?>" required>
            
				<input type="password" placeholder="تأكيد كلمة السر" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			
				<button name="submit" >إنشاء</button>
			
			<h3><p   color = "black">هل لديك حساب? <a href="index.php">تسجيل الدخول</a>.</p></h3>
		</form>
	
	
	</div>

</body>
</html>