<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include 'language/language.php';
include 'libs/secure.php';
$ini_array = parse_ini_file("libs/config.ini", true);
$custompage = $db->getCustompage();	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $custompage[0]['name']; ?></title>
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

	echo $custompage[0]['content'];
	?>
  
	
</div>


   <div class="apmenu">
<?php
	$event = $db->getEvent();
	echo '<div class="titulekapp">'.$event[0]['event'] .'</div>';
	?>
<?php include 'navlinks.php'; ?>


</div>

<div style="text-align:center"><a href="<?php echo $canvas_url; ?>privacy.php#top"><?php print(_PRIVACYPOLICY); ?></a></div>
<?php include './libs/tracking.php'; ?>
</body>
</html>