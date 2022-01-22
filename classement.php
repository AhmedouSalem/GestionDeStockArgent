<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etab.css">
</head>
<body></body>

<?php
$con=mysqli_connect("localhost","root","","bd annuaire téléphonique pour les établissements");
if(!$con){die("Erreur de type: " .mysqli_connect_error()); }
else "OK";

//Affichage de données

echo "<table border >";
echo "<tr>"."<th colspan='4'>"."<a href='projet.php'>"."<button>"."Acceuil"."</button>"."</a>"."</th>";
echo "<th colspan='3' style='align:left;'>"."<h1>"."chercher un établissement"."</h1>"."<form method='post' action='cher_etab_result.php'>"."<label>"."Nom ou Email"."</label>"."<input type='text' id='nm' name='nom' placeholder='Votre nom ou Email...'style='width: 50%;' required>"."<input type='submit'style='width: 20%;' value='Envoyer' name='btn'>"."<br>"."</form>"."</th>";





echo "<th colspan='3'>"."<a href='logout.php'>"."<button style='background-color: green;color :white;'>"."Sortir"."</button>"."</a>"."</th>"."</tr>";
echo "<th colspan='10'>"."<h1>"."Liste Des Établisment Par Secteur D'activité"."</h1>"."</th>"."</tr>";

echo "<tr>";
echo "<th width='130px'>". "id-Etablissement". "</th>";
echo "<th>". "Nom". "</th>";
echo "<th width='100px'> ". "Desicription". "</th>" ;
echo "<th>". "Tél". "</th>" ;
echo "<th> ". "Date de création". "</th>" ;
echo "<th>". "E-mail". "</th>" ;
echo "<th>". "Secteur_d'activité". "</th>" ;
echo "<th>". "Adresse". "</th>" ;
echo "<th colspan='2'>". "Action". "</th>"."</tr>" ;
$secteur = $_GET['edit_id'];
$sql= "SELECT * FROM `etablissement` WHERE `secteur d'activité` = '$secteur'";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	$id = $row['id-Etablissement'];
	echo "<tr>";
	echo"<td>".$row['id-Etablissement']."</td>";
	echo"<td>".$row['nom']."</td>"; 
	echo "<td>".$row['Description']."</td>";
	echo "<td>".$row['tél']."</td>";
	echo "<td>".$row['date de création']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row["secteur d'activité"]."</td>";
	echo "<td>".$row['adresse']."</td>";
		
	?>
	<td align="center">
        <a href="modifier.php?edit_id=<?php print($id); ?>" ><font color ="blue">Modifier<?php echo "<img src='update.PNG'>"; ?> </font></a>        
	</td>			
    <td align="center">            
        <a  href="supprimer.php?delete_id=<?php print($id); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer  ?')">
			<font color ="blue">supprimer<?php echo "<img src='trash.PNG'>"; ?> </font></a>        
    </td>            
				
                
<?php
	
	
	
	echo "</tr>";
  	
	
	
}	
} else 
{
	echo "<tr>";
	echo "<td colspan='4'>";
echo  "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
?>