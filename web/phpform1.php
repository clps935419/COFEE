<?php require_once('../Connections/php.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_php, $php);
$query_Recordset1 = "SELECT * FROM `order` ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $php) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;


$name=$row_Recordset1['name'];
$phone=$row_Recordset1['phone'];
$address=$$row_Recordset1['address'];
$coffe=$row_['coffe'];
$box=$row_Recordset1['box'];

$file=fopen("p4-2.txt","a");
fwrite($file,"姓名:$name;電話:$phone; 地址:$address; 咖啡品項:$coffe; 數量:$box\r\n");
fclose ($file);
if(isset($guestName)){
mysql_query("insert into order value('','$name','$phone','$address','$coffe','$box',')");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="../css/animate.css" rel="stylesheet" type="text/css" />
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('../image/11meal.png','../image/11coffee.png','../image/11knit.png','../image/11aboutus.png')">
<div id="wrappera">
<div id ="hbut"><a href="mealm.html"><img src="../image/1meal.png" name="am" width="130" height="70" class="bounce" id="am" onmouseover="MM_swapImage('am','','../image/11meal.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="coffe -main.html"><img src="../image/1coffee.png" name="ac" width="140" height="80" class="bounce1" id="ac" onmouseover="MM_swapImage('ac','','../image/11coffee.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="index.php"><img src="../image/logo3.png" name="logo3" width="86" height="123"  id="logo3" /></a><a href="knitm .html"><img src="../image/1knit.png" name="ak" width="143" height="62" class="bounce2" id="ak" onmouseover="MM_swapImage('ak','','../image/11knit.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="about main.html"><img src="../image/1aboutus.png" name="aab" width="201" height="59" class="bounce" id="aab" onmouseover="MM_swapImage('aab','','../image/11aboutus.png',1)" onmouseout="MM_swapImgRestore()" /></a></div>
<div id="mi">
<div id="content">
<p align="center">您的訂單資訊如下 ：</p>

<div align="center">
  <table border="1">
    <tr>
      <td>姓名</td>
      <td>電話</td>
      <td>地址</td>
      <td>咖啡</td>
      <td>數量</td>
      </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['name']; ?></td>
        <td><?php echo $row_Recordset1['phone']; ?></td>
        <td><?php echo $row_Recordset1['address']; ?></td>
        <td><?php echo $row_Recordset1['coffe']; ?></td>
        <td><?php echo $row_Recordset1['box']; ?></td>
        </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
