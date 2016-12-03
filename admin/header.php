<?php 
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['user']))
{
	header("location:./login.php");
	exit;
}
include '../libs/myDb.php';
include '../language/language.php';

$db = new myDb;
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title><?php print(_ADMINCP); ?></title>
<link media="all" rel="stylesheet" type="text/css" href="../style.css" />
<!-- OF COURSE YOU NEED TO ADAPT NEXT LINE TO YOUR tiny_mce.js PATH -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "exact",
		elements : "text2,text3,text4"
});
</script>
</head>
<body>