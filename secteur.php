<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir='rtl'>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="etab.css">
    <title>Document</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
//Affichage de données

echo "<table border >";
echo "<tr>"."<th >"."<a href='projet.php'>"."<button>"."الرئيسية"."</button>"."</a>"."</th>";






echo "<th >"."<a href='logout.php'>"."<button style='background-color: green;color :white;'>"."خروج"."</button>"."</a>"."</th>"."</tr>";
echo "<th colspan='10'>"."<h1>"."اللائحة حسب المصدر"."</h1>"."</th>"."</tr>";
echo "<tr>";
echo "<th><h3>المصدر </h3></th>"; 
echo "<th width='50%' ><h3>عرض</h3></th></tr>" ;

$sql= "SELECT DISTINCT `emmission`FROM `operation`";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
    $id = $row["emmission"];
    echo "<tr>";
    echo"<td>".$row["emmission"]."</td>";
?>    
    <td align="center">
    <a href="Idex_projet_clasment.php?edit_id=<?php print($id); ?>" >إنقر لعرض المزيد</a>        
    </td>

<?php
	
	
	
	echo "</tr>";
  	

}
} else 
{
	echo "<tr>";
	echo "<td colspan='4'>";
echo  "لا يوجد نتائج لعرضها";
echo "</td>";
}
echo "</table>";
?>


   