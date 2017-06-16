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

if ((isset($_GET['id'])) && ($_GET['id'] != "") && (isset($_GET['del']))) {
  $deleteSQL = sprintf("DELETE FROM ``order`` WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_php, $php);
  $Result1 = mysql_query($deleteSQL, $php) or die(mysql_error());

  $deleteGoTo = "form.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['id'])) && ($_GET['id'] != "") && (isset($_GET['del']))) {
  $deleteSQL = sprintf("DELETE FROM ``order`` WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_php, $php);
  $Result1 = mysql_query($deleteSQL, $php) or die(mysql_error());

  $deleteGoTo = "form.php";
  /*
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  */
  header(sprintf("Location: %s", $deleteGoTo));
}


$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_php, $php);
$query_Recordset1 = "SELECT * FROM `order` ORDER BY id ASC";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<div align="center">
  <table border="1">
    <tr>
      <td>id</td>
      <td>name</td>
      <td>phone</td>
      <td>address</td>
      <td>coffe</td>
      <td>box</td>
      <td>動作</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['id']; ?></td>
        <td><?php echo $row_Recordset1['name']; ?></a></td>
        <td><?php echo $row_Recordset1['phone']; ?></td>
        <td><?php echo $row_Recordset1['address']; ?></td>
        <td><?php echo $row_Recordset1['coffe']; ?></td>
        <td><?php echo $row_Recordset1['box']; ?></td>
       <td><a href="form.php?del=true&amp;id=<?php echo $row_Recordset1['id']; ?>" id="del">刪除</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
