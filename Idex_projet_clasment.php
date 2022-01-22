<!DOCTYPE html>
<html lang='ar' dir='rtl'>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etab.css">
</head>
<body id="cvc"></body>

<?php
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع: " .mysqli_connect_error()); }
else "OK";

//Affichage de données
echo "<table border>";
echo "<tr>"."<th colspan='5'>"."<a href='projet.php'>"."<button>"."الرئيسية"."</button>"."</a>"."</th>";
echo "<th colspan='4'>"."<a href='logout.php'>"."<button style='background-color: green;color :white;'>"."خروج"."</button>"."</a>"."</th>"."</tr>";
echo "<tr>"."<th colspan='9'>"."<h4>"."لائحة العمليات"."</h4>"."</th>"."</tr>"."</table>";
echo "<table border width='80%'>";
echo "<table  id='c' border >";
echo "<tr  id='c' >";
echo "<th width='10px' class='df' id='c'>". "تحديد الحالة". "</th>";
echo "<th  id='c'>". "التاريخ". "</th>";
echo "<th  id='c' width='100px'> ". "المصدر". "</th>" ;
echo "<th  id='c'>". "المكان الأصلي". "</th>" ;
echo "<th  id='c'> ". "المبلغ". "</th>" ;
echo "<th  id='c'>". "الضريبة". "</th>" ;
echo "<th  id='c'>". "الوجهة". "</th>" ;
echo "<th id='c'>". "الرقم". "</th>" ;
// echo "<th id='c' colspan='2'>". "تحرير". "</th>"."</tr>" ;
echo "<th>"."الحالة"."</th>"."</tr>" ;
$sectur = $_GET['edit_id'];
$sql= "SELECT * FROM `operation` WHERE `emmission` = '$sectur'";
$resultat = mysqli_query($con,$sql);
if(mysqli_num_rows($resultat)>0){
while($row=mysqli_fetch_assoc($resultat)){
	$id = $row['id_operation'];
	echo "<tr id='c'>";
	if ($row['emmission'] !== "التيشطيات") {
		?>
	<td><a href="new.php?dd=<?php print($id); ?>"><img src="conf.png" alt=""></a></td><?php
	}else {
		?><td><img src="conf.png" alt=""></td><?php
	}
	echo"<td id='c'>".$row['date']."</td>"; 
	echo "<td id='c'>".$row['emmission']."</td>";
	echo "<td id='c'>".$row['nom_client_E']."</td>";
	echo "<td id='c'>".$row['solde']."</td>";
	echo "<td id='c'>".$row['impot']."</td>";
	echo "<td id='c'>".$row["destination"]."</td>";
	echo "<td id='c'>".$row['num_tel']."</td>";
		
	?>
	<!-- <td id='c' align="center">
        <a href="modifier.php?edit_id=<?php //print($id); ?>" ><img src='update.PNG'>تعديل</a>        
	</td>			
    <td id='c'  align="center">            
        <a  href="supprimer.php?delete_id=<?php// print($id); ?>" onclick="return confirm('هل أنت متأكد من الإزالة  ?')">
			<img src='trash.PNG' >إزالة</a>        
    </td>             -->
				
                
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
echo  "لا يوجد نتائج لعرضها";
echo "</td>";
}
echo "</table>";
?>
<?php
$d = date("Y-m-d") ;
$ta="SELECT `date` AS hg FROM `operation` Where `date` = '$d' AND `emmission`= '$sectur'";
$rset = mysqli_query($con,$ta);
	$tr = mysqli_fetch_assoc($rset);
	$dr= $tr['hg'];

if (($dr == $d) && ($rset)) {
    $sq = "SELECT SUM(`solde`)AS some FROM `operation` WHERE  `emmission` = '$sectur' AND `date` = '$d'";
    $rest = mysqli_query($con, $sq);
    $rt = mysqli_fetch_assoc($rest);
    $rdt= $rt['some'];

    ///////
    $sq = "SELECT SUM(`impot`)AS something FROM `operation` WHERE  `emmission` = '$sectur' AND `date` = '$d'";
    $res = mysqli_query($con, $sq);
    $r = mysqli_fetch_assoc($res);
    $rd= $r['something'];
    echo "<table><tr><td>"."الضريبة  ".$rd."</td>"."<td>"."المبلغ  ".$rdt."</td>"."</tr>";
    $x = "$rd"+"$rdt";
    echo "<tr><td>"."  المبلغ + الضريبة   =   ".$x."</td>"."</tr>"."</table>";
}else {
	echo "<table><tr><td>"."لم يتم تسجيل أي شيء في تاريخ اليوم $d"."</td>"."</tr>"."</table>";
}
?>