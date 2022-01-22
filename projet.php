<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<html lang='ar' dir='rtl'>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="etab.css">
</head>
<body>
  <table cellspacing="0" style="cellpadding:0;cellspacing:0;width: 100%;background-color: rgb();">
    <tr>
      <th ><h1>إضافة زبون</h1></th>
      <th><a href="logout.php"><button style="background-color: green;color :white;">خروج</button></a></th>
    </tr>
    <tr style="height: 5%;">
      <td rowspan="3" style="height:  5%;">
<div class="container"style="height: 5%">


<form method="post" action="project.php">
<label><b>المكان الأصلي :</b></label>
<input type="text" name="nom" id="nm" placeholder="المكان الأصلي..."><br>

<label><b>المبلغ :</b></label>

<!-- <textarea  name="txt"  placeholder="Votre desicription"></textarea><br> -->
<input type="text" name="txt" id="" placeholder="المبلغ..."><br>

<label><b>الرقم :</b></label>
<input type="tel" name="num" id="prenom"  placeholder="الرقم..." required minlength='8' maxlength='8'><br><br>

<label><b>التاريخ:</b></label>
<input type="date" name="dateen" id="adrs" placeholder="التاريخ..." required><br><br>

<label><b>الوجهة :</b></label>
<input type="text" name="mail" id="email" placeholder="الوجهة..." required><br><br>

<label><b>المصدر :</b></label>
<select  type="text" id="nom" name="actv">
              <option>التيشطيات</option>
              <option>اركيز</option>
            </select>
<br>

<label><b>الضريبة :</b></label>
<!-- <input type="text" name="adrs" id="adr" placeholder="الضريبة..." required><br> -->
<select type='text' name="adrs" id="adr">
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

<center><button style="type:submit;">إدخال</button><br>

</form>
</div>
</center>
</form>
</div>
</td>
<td>
  <b><a href="liste_etab.php" ><font color="blue"><button>لائحة العمليات</button></font> </a></b><br>

</td>
</tr>
<tr>
<td><b><a href="cher_etab.php" ><font color="blue"><button>إبحث عن زبون</button></font> </a></b><br></td>
</tr>
<tr><td><b><a href="secteur.php" ><font color="blue"><button>التيشطيات أو اركيز</button></font> </a></b>
<br></td></tr>
<tr><td><b></b>
<br></td></tr>

</table>
</body>
</html>
