<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'language/language.php';
include 'libs/secure.php';
$ini_array = parse_ini_file("libs/config.ini", true);
	if(isset($_SESSION['message']))
	{
		echo "<h2>" . $_SESSION['message'] . "</h2>";
		unset($_SESSION['message']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print(_THERMSANDC); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<a name="top"></a>
<?php $event = $db->getEvent(); ?>
<div class="logo"><a href="./index.php"><img src="image/logo.jpg" title="<?php echo $event[0]['event'];?>" alt="<?php echo $event[0]['event'];?>" /></a></div>
<div class="apmenu">
  <?php
	$event = $db->getEvent();
	echo '<div class="titulekapp">'.$event[0]['event'] .'</div>';
	?>
  <?php include 'navlinks.php'; ?>
</div>
<div class="obsah">
  <?php

	$hh = $db->getRules();
	echo($hh[0]['condition']);
	?>
</div>
<div class="apmenu">
  <?php
	$event = $db->getEvent();
	echo '<div class="titulekapp">'.$event[0]['event'] .'</div>';
	?>
  <?php include 'navlinks.php'; ?>
</div>
<div style=" text-align:center"><a href="./privacy.php#top"><?php print(_PRIVACYPOLICY); ?></a></div>
<?php include './libs/tracking.php'; ?>
</body>
</html>