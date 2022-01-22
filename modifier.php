<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<?php
$con=mysqli_connect("localhost","root","","argent");
if(!$con){die("خطأ من نوع : " .mysqli_connect_error()); }
else "OK";
if (isset($_GET['edit_id'])){
$id=$_GET['edit_id'];
$sq= "SELECT * FROM `operation` WHERE `id_operation`='$id' ";
$result = mysqli_query($con,$sq);
if($result){
$row = mysqli_fetch_assoc($result);

$nm=$row['date'];
$desc=$row['emmission'];
$tel=$row['nom_client_E'];
$dte=$row['solde'];
$email=$row['impot'];
$sec=$row["destination"];
$ad=$row['num_tel'];
}
else echo "تأكد من إستعلامك";
}
if(isset($_POST['btn-save']))
{
	$nom = $_POST['nom'];
    $descr = $_POST['txt'];
    $numb = $_POST['num'];
    $date = $_POST['dateen'];
    $email = $_POST['mail'];
    $sect = $_POST['actv'];
    $adr = $_POST['adrs'];
	
	$sql= "UPDATE  operation SET `date`='$date ', `emmission`='$sect', `nom_client_E`='$nom', `solde`='$descr',`impot`='$adr', `destination`='$email', `num_tel`='$numb' WHERE `id_operation`='$id' ";
	$resultat = mysqli_query($con,$sql);
	if($resultat)
	{
		header("Location: liste_etab.php");
	}
	else
	{
		echo "خطأ";
		
	}
}
?>

<!DOCTYPE html>
<html lang='ar' dir='rtl'>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etab.css">
</head>
<body>
<table cellspacing="0" cellpadding="0">
  <tr><th><a href="projet.php"><button>الرئيسية</button></a></th>
      <th><a href="logout.php"><button style="background-color: green;color :white;">خروج</button></a></th>
  </tr>
  <tr style="height: 5%;"><td colspan="2" style="height: 5%;">
<div class="container"style="height: 5%;">
<h1>تعديل ملومات التحويل</h1>
<form method="post"  >
<label><b>الإسم :</b></label>
<input type="text" name="nom" id="nm" value="<?php if (isset($_GET['edit_id'])){print $tel;} ?>" ><br>

<label><b>المبلغ :</b></label>
<textarea  name="txt" required><?php if (isset($_GET['edit_id'])){print $dte;} ?></textarea><br>

<label><b>الرقم:</b></label>
<input type="text" name="num" id="prenom"  value="<?php if (isset($_GET['edit_id'])){print $ad;} ?>" required minlength='8' maxlength='8'><br><br>

<label><b>التاريخ :</b></label>
<input type="date" name="dateen" id="adrs" value="<?php if (isset($_GET['edit_id'])){print $nm;} ?>" required><br><br>

<label><b>الوجهة :</b></label>
<input type="text" name="mail" id="email" value="<?php if (isset($_GET['edit_id'])){print $sec;} ?>" required><br><br>

<label><b>المصدر :</b></label>
<select type="text" id="nom" name="actv" value="<?php if (isset($_GET['edit_id'])){print $desc;} ?>" required>
              <option ><?php if (isset($_GET['edit_id'])){print $desc;} ?></option>
              <option >التيشطيات</option>
              <option>اركيز </option>
            </select>
<br>

<label><b>الضريبة :</b></label>
<!-- <input type="text" name="adrs" id="adr" value="<?php //if (isset($_GET['edit_id'])){print $email;} ?>" required><br> -->
<select type='text' name="adrs" id="adr" value="<?php if (isset($_GET['edit_id'])){print $email;} ?>" required>
<option ><?php if (isset($_GET['edit_id'])){print $email;} ?></option>
<option>250</option>
  <option>500</option>
  <option>1000</option>
  <option>1500</option>
  <option>2000</option>
  <option>2500</option>
  <option>3000</option>
  <option>3500</option>
  <option>4000</option>
  <option>4500</option>
  <option>5000</option>
</select>

<center><input type="submit" value="تعديل" name="btn-save">

<br>
</form>
</div>
</center>
</form>
</div>
</td>
</tr>
</table>
</body>
</html>
