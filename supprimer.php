
<?php 
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
$id=$_GET['delete_id'];
$sql= "delete  from `operation` where `id_operation`='$id' ";
$resultat = mysqli_query($con,$sql);

	
	if(isset($resultat))
	{
		header ("location:liste_etab.php");
	}
	else
	{
		echo "خطأ";
	}

	?>