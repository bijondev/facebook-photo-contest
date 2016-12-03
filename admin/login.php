<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
include '../language/language.php';
$ini_array = parse_ini_file("../libs/config.ini", true);
?>
<?php
if (isset($_SESSION['message']))
	{
		//echo '<h1>' . $_SESSION['message'] . '</h1>';
		unset($_SESSION['message']);
	}

?>

<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title><?php print(_LOGINTITLE); ?></title>
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

<div class="logo"><a href="./index.php"><img src="../image/logo.jpg" /></a></div>
<div class="apmenu">
	<div class="titulekapp"></div>
<?php include 'navlinks.php'; ?>


</div>


<?php
		if ($_GET['logout'] == 'yes')
		{
			session_destroy();
			echo '<div class="obsah2"><h2><div class="hlaska3">'._LOGGEDOUT.'</div></h2></div>';
		}
		?>

<div class="obsah">
<form id="formus" name="form" method="post" action="login_send.php">
<h2><?php print(_LOGINTITLE); ?></h2>
<br />
<label><?php print(_ACPUSER); ?></label>
<input type="text" name="user" id="name" style="width:230px;"/>
<div style="width:100%; clear:both;"></div>
<label><?php print(_ACPPASS); ?></label>
<input type="password" name="pass" id="password" style="width:230px;" />
<div style="width:100%; clear:both;"></div>
<button type="submit"><?php print(_LOGIN); ?></button>
<div class="spacer"></div>

</form>
</div>

   <div class="apmenu">
	<div class="titulekapp"></div>
<?php include 'navlinks.php'; ?>


</div>




</div>


<?php include_once 'footer.php'; ?>