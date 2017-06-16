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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `order` (name, phone, address, coffe, box) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['coffe'], "text"),
                       GetSQLValueString($_POST['box'], "text"));

  mysql_select_db($database_php, $php);
  $Result1 = mysql_query($insertSQL, $php) or die(mysql_error());

  $insertGoTo = "phpform1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_php, $php);
$query_Recordset1 = "SELECT * FROM `order` ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $php) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$query_Recordset1 = "SELECT * FROM `order` ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $php) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/animate.css" rel="stylesheet" type="text/css" />
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
<title>無標題文件</title>
<script language="Javascript">
<!--
function VF_form1(){ //v2.0
<!--start_of_saved_settings-->
<!--type,text,name,address,required,true,errMsg,你沒填地址喔-->
<!--type,text,name,phone,required,true,isNum,errMsg,你沒填電話喔-->
<!--type,text,name,name,required,true,errMsg,你沒填姓名喔-->
<!--end_of_saved_settings-->
	var theForm = document.form1;
	var numRE = /^\d+$/;
	var errMsg = "";
	var setfocus = "";

	if (theForm['address'].value == ""){
		errMsg = "你沒填地址喔";
		setfocus = "['address']";
	}
	if (!numRE.test(theForm['phone'].value)){
		errMsg = "你沒填電話喔";
		setfocus = "['phone']";
	}
	if (theForm['name'].value == ""){
		errMsg = "你沒填姓名喔";
		setfocus = "['name']";
	}
	if (errMsg != ""){
		alert(errMsg);
		eval("theForm" + setfocus + ".focus()");
	}
	else theForm.submit();
}
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
//-->
</script>

</head>

<body onload="MM_preloadImages('../image/11meal.png','../image/11coffee.png','../image/11knit.png','../image/11aboutus.png')">
<div id="wrappera">
<div id ="hbut"><a href="mealm.html"><img src="../image/1meal.png" name="am" width="130" height="70" class="bounce" id="am" onmouseover="MM_swapImage('am','','../image/11meal.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="coffe -main.html"><img src="../image/1coffee.png" name="ac" width="140" height="80" class="bounce1" id="ac" onmouseover="MM_swapImage('ac','','../image/11coffee.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="index.php"><img src="../image/logo3.png" name="logo3" width="86" height="123"  id="logo3" /></a><a href="knitm .html"><img src="../image/1knit.png" name="ak" width="143" height="62" class="bounce2" id="ak" onmouseover="MM_swapImage('ak','','../image/11knit.png',1)" onmouseout="MM_swapImgRestore()" /></a><a href="about main.html"><img src="../image/1aboutus.png" name="aab" width="201" height="59" class="bounce" id="aab" onmouseover="MM_swapImage('aab','','../image/11aboutus.png',1)" onmouseout="MM_swapImgRestore()" /></a></div>
<div id="mi">
<div id="content">
  <div align="center">
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table width="374" height="227" align="center">
        <tr valign="baseline">
          <td width="35" align="right" nowrap="nowrap">姓名:</td>
          <td width="478"><input type="text" name="name" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">電話:</td>
          <td><input type="text" name="phone" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">地址:</td>
          <td><input type="text" name="address" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">咖啡:</td>
          <td><input  <?php if (!(strcmp($row_Recordset1['coffe'],"爪哇"))) {echo "checked=\"checked\"";} ?> type="radio" name="coffe" id="radio" value="爪哇" />
            爪哇
              <input type="radio" name="coffe" id="radio2" value="曼特寧" />
              <label for="radio2">曼特寧
                <input type="radio" name="coffe" id="radio3" value="哥倫比亞" />
                哥倫比亞</label>
              <input type="radio" name="coffe" id="radio4" value="宏都拉斯" />
              <label for="radio4">宏都拉斯
                <input type="radio" name="coffe" id="radio5" value="藍山" />
                藍山
                <input type="radio" name="coffe" id="radio6" value="瓜地馬拉" />
              瓜地馬拉
              <input type="radio" name="coffe" id="radio7" value="巴西" />
              巴西</label></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">數量:</td>
          <td><input type="text" name="box" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="送出" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
