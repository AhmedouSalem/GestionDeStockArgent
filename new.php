<?php
if(isset($_GET['dd'])){
	$kkk=$_GET['dd'];
    $sb='تم التسليم';
// }
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
// if (isset($_POST['submit'])) {
    
    $sql= "UPDATE  operation SET `SSB`= '$sb' WHERE `id_operation`='$kkk' ";
	$resultat = mysqli_query($con,$sql);
    if($resultat)
	{
		header("Location: liste_etab.php");
	}
	else
	{
		echo "خطأ التسليم";
		
	}
}
?>