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

mysql_select_db($database_php, $php);
$query_Recordset1 = "SELECT * FROM `order`";
$Recordset1 = mysql_query($query_Recordset1, $php) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>妮特編織咖啡館</title>
<link rel="stylesheet" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/animate.css">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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

<body onload="MM_preloadImages('編織.png','../image/12233448_1651409578474395_2137981045_n.jpg','../image/12242144_1651409575141062_1407630331_n.jpg','../image/12243763_1651409581807728_1479788072_n.png','../image/12272850_1651409585141061_1405315467_n.png','../image/FB1.png','../image/IG1.png','../image/paper1.png')">
<div id="wrapper"> 

  
  
  <div id="content">
  <div id="header1">
  <a href="mealm.html"><img src="../image/meal.png" name="meal" width="261" height="299" class="animated bounceInDown" id="meal" onmouseover="MM_swapImage('meal','','../image/12233448_1651409578474395_2137981045_n.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="about main.html"><img src="../image/About us.png" name="about" width="209" height="329" class="animated bounceInDown" id="about" onmouseover="MM_swapImage('about','','../image/12242144_1651409575141062_1407630331_n.jpg',1)" onmouseout="MM_swapImgRestore()" /></a></a><img src="../image/LOGO2.png" name="logo2" width="70" height="107" class="bounce1  " id="logo2" /></div>
    <div id="mid"><p><img src="../image/logo.png" name="logo" width="400" height="432" /class="animated bounceInDown" id="logo">
    </p>
  <img src="../image/Knit coffee.png" name="word" width="285" height="198" id="word" /> </div>
  <div id="btn"><a href="coffe -main.html"><img src="../image/coffee.png" name="coff" width="182" height="286" class="animated bounceInDown" id="coff" onmouseover="MM_swapImage('coff','','../image/12243763_1651409581807728_1479788072_n.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="knitm .html"><img src="../image/Knit.png" name="kn" width="182" height="286" class="animated bounceInDown" id="kn" onmouseover="MM_swapImage('kn','','../image/12272850_1651409585141061_1405315467_n.png',1)" onmouseout="MM_swapImgRestore()" /></a></div>
<div id="footer"><img src="../image/12271006_1651666011782085_2056127948_o.jpg" name="line" width="2048" height="100" id="line" />
<div id="footer1"><a href="https://www.facebook.com/%E5%A6%AE%E7%89%B9%E7%B7%A8%E7%B9%94%E5%92%96%E5%95%A1%E9%A4%A8-1574998692773854/"><img src="../image/FB.png" name="fb" width="108" height="101" id="fb" onmouseover="MM_swapImage('fb','','../image/FB1.png',1)" onmouseout="MM_swapImgRestore()" /></a>
<a href="https://www.instagram.com/knit11012/"><img src="../image/IG.png" name="ig" width="108" height="101" id="ig" onmouseover="MM_swapImage('ig','','../image/IG1.png',1)" onmouseout="MM_swapImgRestore()" /></a>
<a href="order.php"><img src="../image/Buy.png" name="paper" width="82" height="80" id="paper" onmouseover="MM_swapImage('paper','','../image/paper1.png',1)" onmouseout="MM_swapImgRestore()" /></a> </div></div>
  <!-- Loading Start -->
<style>
.dt-loading{background:rgba(255,255,255,0.8)repeat;width:100%;height:100%;z-index:101;text-align:center;position:fixed;top:0;bottom:0;left:0;right:0;padding:20% 0}
</style>
<div class="dt-loading">
<img src="../image/Loading5.gif" name="gi" width="433" height="650" id="gi"></img>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>setTimeout(function(){$(".dt-loading").fadeOut('slow');},3000);</script>
<!-- End -->
 
</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
