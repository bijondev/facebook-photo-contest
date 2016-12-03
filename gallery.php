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


		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print(_TITGALLERY); ?></title>
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
<?php if(isset($_SESSION['message']))
	{
		echo "<div class='obsah2'><h2>" . $_SESSION['message'] . "</h2></div>";
		unset($_SESSION['message']);
	} ?>

<div class="obsah">
<div class="razeni">
	<?php print(_ORDEREDBY); ?> :: <a href="./gallery.php?order_by=id_desc" <?php if (!isset($_GET['order_by']) or $_GET['order_by']=='id_desc' ){echo 'class="aktivnirazeni"';}?>><?php print(_NEWEST); ?></a> ::
	<a href="./gallery.php?order_by=id_asc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='id_asc'){echo 'class="aktivnirazeni"';}?>><?php print(_OLDEST); ?></a> ::
	<a href="./gallery.php?order_by=rating_desc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='rating_desc'){echo 'class="aktivnirazeni"';}?> ><?php print(_MOSTVOTES); ?></a> ::
	<a href="./gallery.php?order_by=rating_asc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='rating_asc'){echo 'class="aktivnirazeni"';}?>><?php print(_LEASTVOTES); ?></a> ::</div>

<ul>
			<?php
		$ini_array = parse_ini_file("libs/config.ini", true);
		$url = $ini_array['fb']['CANVAS_URL'];
		$order = array(
			'id_desc' => 'photos.id DESC',
			'id_asc' => 'photos.id ASC',
			'rating_desc' => 'photos.rating DESC',
			'rating_asc' => 'photos.rating ASC'
		);

		if (isset($_GET['order_by']) && array_key_exists(''.$_GET['order_by'].'', $order))
  {
   $orderBy = $order[$_GET['order_by']];
  }
  else
  {
   $orderBy = 'photos.id DESC';
  }
		if (isset($_GET['offset']) && is_numeric($_GET['offset']))
		{
			$offset = $_GET['offset'];
		}
		else
		{

			$offset = 0;
		}

		 $hh = $db->getImgPerPage();
		$limit = $hh[0]['img_per_page'];

		$url = $ini_array['fb']['CANVAS_PAGE'];
		$canvas_url = $ini_array['fb']['CANVAS_URL'];


		foreach ($db->getGallery($orderBy, $offset, $limit) as $gall)
		{
			echo '
		<li class="obrazekbox">

		   <div class="miniaturactverec">
		   <a target="_parent" href="'. $url .  'detail.php?id=' .$gall['pid'] .'">
		   <img src="' .$canvas_url. 'libs/upload/upload/' .$gall['user_id'] .'/miniatury/' .$gall['name'] .'" width="177" height="177" alt="' .$gall['photo_name'] .'"/>
		   </a>
		   <div class="podbox">
		   <div class="cervenetlacitko"><a target="_parent" href="'. $url .  'detail.php?id=' .$gall['pid'] .'">'._IMGDETAIL.'</a></div>
		   <div class="cernetlacitko">' .$gall['rating'] .' '._IMGVOTES.'</div>
		   <div class="clear"></div>
		   </div>
		   </div>
		   </li>
			';

		}
	?>
</ul>



<div class="clear"></div>

<!--Stránkování-->
<ul class="strankovani">

	<?php



$pages = ceil($db->countImages()/$hh[0]['img_per_page']);

if (isset($_GET['page']) and is_numeric($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 1;
}

	if (isset($_GET['order_by']))
		{
		$oderBy = "?order_by=" .$_GET['order_by'] ."";
		}
		else
		{
			$oderBy = "?order_by=id_desc";
		}


$i = $page - 1;
if ($i >= 1)
{
	$u = ($i * $hh[0]['img_per_page']) - $hh[0]['img_per_page'];
	echo "<li><a href='./gallery.php$oderBy&amp;offset=$u&amp;page=$i'>" ._IMGPREV."</a></li>
	";
}


for ($i = 1; $i <= $pages; $i++)
{
	$u = ($i * $hh[0]['img_per_page']) - $hh[0]['img_per_page'];

		if ($page == $i)
		{
			echo "<li><a href='./gallery.php$oderBy&amp;offset=$u&amp;page=$i' class=\"aktualni\">$i</a></li>
			";
		}
		else
		{
			echo "<li><a href='./gallery.php$oderBy&amp;offset=$u&amp;page=$i'>$i</a></li>
			";
		}


}

$icko = $i;
$i = $page + 1;

if ($i != $icko)
{
	$u = ($i * $hh[0]['img_per_page']) - $hh[0]['img_per_page'];
	echo "<li><a href='./gallery.php$oderBy&amp;offset=$u&amp;page=$i'>" ._IMGNEXT."</a></li>
	";
}
	?>

</ul>

<div class="clear"></div>
</div>


   <div class="apmenu">
<?php
	$event = $db->getEvent();
	echo '<div class="titulekapp">'.$event[0]['event'] .'</div>';
	?>
<?php include 'navlinks.php'; ?>

</div>
<div class="clear"></div>
<div style=" text-align:center"><a href="./privacy.php#top"><?php print(_PRIVACYPOLICY); ?></a></div>
<?php include './libs/tracking.php'; ?>
</body>
</html>