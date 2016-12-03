<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'language/language.php';
include 'libs/secure.php';

	$id = $facebook->getUser();

	$ini_array = parse_ini_file("libs/config.ini", true);
	$appId = $ini_array['fb']['appId'];

	$url = $ini_array['fb']['CANVAS_PAGE'];
	$url2 = $ini_array['fb']['CANVAS_URL'];
	$canvas_url = $ini_array['fb']['CANVAS_URL'];

		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print(_YOURENTRIES); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<a name="top"></a>
<div id="fb-root"></div>
         <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php print(_FBLOCALE); ?>/all.js#xfbml=1&appId=<?php echo $appId; ?>";
  fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));</script>
<?php $event = $db->getEvent(); ?>
<div class="logo"><a href="./index.php"><img src="image/logo.jpg" title="<?php echo $event[0]['event'];?>" alt="<?php echo $event[0]['event'];?>" /></a></div>
<div class="apmenu">
		<?php
	$event = $db->getEvent();
	echo '<div class="titulekapp">'.$event[0]['event'] .'</div>';
	?>

<?php include 'navlinks.php'; ?>

</div>
<div class="obsah2">
<div class="hlaska3"><?php print(_YITITLE); ?></div>
</div>
<div class="obsah3">
<div class="levastrana">
<div class="ikonad">
	<?php echo '
	<img src="https://graph.facebook.com/'. $id .'/picture" border="0" title="'. $user['name'] .'"/>
		';?>
        
	</div>
<div class="textautor">
<strong><?php echo(_YIAUTHOR); ?></strong> <?php echo $user['name']; ?>

</div></div>
<div class="clear"></div>
</div>

	<?php


	$arr = $db->getPhotoByUser($id);
	if (empty($arr))
	{
		echo '<div class="obsah2"><div class="hlaska">'._ERRNOIMAGEUPLOADED.'</div></div>
		';

	}
	else
	{
		foreach ($arr as $photo)
		{
		$photoshort = substr($photo['photo_name'],0,30).'...';
		echo '
			<div class="obsah4">
		<div class="meobrazkybox">
		<div class="miniatura">
				<a target="_top" href="'. $url .'detail.php?id=' .$photo['pid'] .'">
					<img src="' .$canvas_url. 'libs/upload/upload/' .$photo['user_id'] .'/miniatury/' .$photo['name'] .'" width="80" height="80" class="detimg" alt="' . $photo['photo_name'] . '" title="' . $photo['photo_name'] . '" />
						</a>
		</div>
		<div class="textum">
		<strong>'._YICAPTION.'</strong><a target="_top" href="'. $url .  'detail.php?id=' .$photo['pid'] .'"> ' . $photoshort . '</a><br />
		<strong>'._YINUMBEROFVOTES.'</strong> ' . $photo['rating'] . '<br />';
		 ?>
		       
		</div>
		<div class="fblikum"><div class="fb-like" data-href="<?php echo $url .'detail.php?id='.$photo['pid']; ?>" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false"></div></div>
       
        
		<?php
		echo '
		<div class="clear"></div>
		<form>
		<input type="text" value="'. $url .  'detail.php?id=' .$photo['pid'] .'" name="url" id="url" class="meinput" onClick="this.select();" />

		</form>
		
		</div>
		
		<div class="clear"></div>
		</div>

		';
		}
		}

?>


<div class="clear"></div>
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
