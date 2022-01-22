<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang='ar' dir='rtl'>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etab.css">
</head>

<?php
//la connexion avec la base de données
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";

//Récupération de données
$nom=$_POST['nom'];

//Affichage les données de recherche
echo "<table border>";
echo "<tr>"."<th colspan='7'>"."<a href='projet.php'>"."<button>"."الرئيسية"."</button>"."</a>"."</th>";
echo "<th colspan='4'>"."<a href='logout.php'>"."<button style='background-color: green;color :white;'>"."خروج"."</button>"."</a>"."</th>"."</tr>";
echo "<tr>"."<th colspan='11'>"."<h4>"."نتائج البحث"."</h4>"."</th>"."</tr>"."</table>";
echo "<table border width='80%'>";
echo "<tr height='50px'>";
echo "<th width='130px'>". "تحديد الحالة". "</th>";
echo "<th>". "التاريخ". "</th>" ;
echo "<th>". "المصدر". "</th>" ;
echo "<th>". "المكان الأصلي". "</th>" ;
echo "<th>". "المبلغ". "</th>" ;
echo "<th>". "الضريبة". "</th>" ;
echo "<th>". "الوجهة". "</th>" ;
echo "<th>". "الرقم". "</th>" ;
echo "<th colspan='2'>". "تحرير". "</th>"."<th>"."الحالة"."</th>"."</tr>" ;
$sql= "select * from operation where num_tel like '%$nom%' or  nom_client_E like '%$nom%'";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	$id=$row['id_operation'];
	echo "<tr>";
	if ($row['emmission'] !== "التيشطيات") {
		?>
	<td><a href="new.php?dd=<?php print($id); ?>"><img src="conf.png" alt=""></a></td><?php
	}else {
		?><td><img src="conf.png" alt=""></td><?php
	}
	echo"<td>". $row['date']."</td>"; 
	echo"<td>". $row['emmission']."</td>";
    echo"<td>". $row['nom_client_E']."</td>";
    echo"<td>". $row['solde']."</td>";
    echo"<td>". $row['impot']."</td>";
    echo"<td>". $row["destination"]."</td>";
    echo"<td>". $row['num_tel']."</td>";
	?>
	<td align="center">
                <a href="modifier.php?edit_id=<?php print($id); ?>" >
				<font color ="blue">تعديل<img src='update.PNG'></font></a>
                </td>
                <td align="center">
                <a href="supprimer.php?delete_id=<?php print($id); ?>" onclick="return confirm('هل أنت متأكد من الإزالة  ?')">
				<font color ="blue">إزالة<img src='trash.PNG'></font></a>
                </td>
	  <?php
	  if ($row['emmission'] !== 'التيشطيات') {
		echo"<td>". $row['SSB']."</td>";
	}else {
		echo "<td>"."تم الإرسال"."</td>";
	}
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