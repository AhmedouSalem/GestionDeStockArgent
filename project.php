<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
//la connexion avec la base de données
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
//Récupération de données
$nom=$_POST['nom'];
$desc=$_POST['txt'];
$numb=$_POST['num'];
$date=$_POST['dateen'];
$mail=$_POST['mail'];
$sect=$_POST['actv'];
$adr=$_POST['adrs'];

//Insertion de données dans la BD
$sql= "insert into operation (date,emmission,nom_client_E,solde,impot,destination,num_tel) values ( '$date', '$sect','$nom', '$desc','$adr', '$mail', '$numb')";
if(mysqli_query($con,$sql)){
header ("location:liste_etab.php");
}
else echo "حدث خطأ ";
?>
</body>
</html>