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
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
//Affichage de données

echo "<table border >";
echo "<tr>"."<th colspan='4'>"."<a href='projet.php'>"."<button>"."الرئيسية"."</button>"."</a>"."</th>";
echo "<th colspan='3' style='align:left;'>"."<h3>"."إبحث عن زبون"."</h3>"."<form method='post' action='cher_etab_result.php'>"."<input type='text' id='nm' name='nom' placeholder='الرقم أو المكان الأصلي...'style='width: 50%;' required>"."<input type='submit'style='width: 20%;' value='إبحث' name='btn'>"."<br>"."</form>"."</th>";


// ."<label>"."الإسم أو الرقم"."</label>"


echo "<th colspan='4'>"."<a href='logout.php'>"."<button style='background-color: green;color :white;'>"."خروج"."</button>"."</a>"."</th>"."</tr>";
echo "<th colspan='11'>"."<h4>"."لائحة العمليات"."</h4>"."</th>"."</tr>";
echo "<tr height='50px'>";
echo "<th width='130px'>". "تحديد الحالة". "</th>";
echo "<th>". "التاريخ". "</th>" ;
echo "<th>". "المصدر". "</th>" ;
echo "<th>". "المكان الأصلي". "</th>" ;
echo "<th>". "المبلغ". "</th>" ;
echo "<th>". "الضريبة". "</th>" ;
echo "<th>". "الوجهة". "</th>" ;
echo "<th>". "رقم الهاتف". "</th>" ;
echo "<th colspan='2'>". "تحرير". "</th>"."<th>"."الحالة"."</th>"."</tr>" ;
$sql= "select * from operation ";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($r=mysqli_fetch_assoc($resultat)){
	$id=$r['id_operation'];
echo "<tr>";
if ($r['emmission'] !== "التيشطيات") {
    ?>
<td><a href="new.php?dd=<?php print($id); ?>"><img src="conf.png" alt=""></a></td><?php
}else {
    ?><td><img src="conf.png" alt=""></td><?php
}

echo"<td>". $r['date']."</td>";
echo"<td>". $r['emmission']."</td>";
echo"<td>". $r['nom_client_E']."</td>";
echo"<td>". $r['solde']."</td>";
echo"<td>". $r['impot']."</td>";
echo"<td>". $r["destination"]."</td>";
echo"<td>". $r['num_tel']."</td>";
?>
<td align="center">
<a href="modifier.php?edit_id=<?php print($id); ?>" >
<font color ="blue">تعديل<?php echo "<img src='update.PNG'>"; ?> </font></a>
</td>
<td align="center">
<a href="supprimer.php?delete_id=<?php print($id); ?>" onclick="return confirm('هل أنت متأكد من الإزلة  ?')">
<font color ="blue">إزالة<?php echo "<img src='trash.PNG'>"; ?></font></a>

<?php
if ($r['emmission'] !== 'التيشطيات') {
    echo"<td>". $r['SSB']."</td>";
}else {
	echo "<td>"."تم الإرسال"."</td>";
}
echo "</tr>";
}
} else
{
echo "<tr>";
echo "<td colspan='4'>";
echo "Aucun enregistrement";
echo "</td>";
}
echo "</table>";
?>
<?php

?>