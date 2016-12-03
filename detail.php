<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include 'libs/secure.php';
include 'language/language.php';


	$id = $_GET['id'];
	if (!is_numeric($id))
	{
		exit;
	}
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
<title><?php print(_DETAILTITLE); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<?php foreach ($db->getPhotoById($id) as $photo)
		{
			
		 ?>
<meta property="og:title" content="<?php echo $photo['photo_name']; ?>" />
<meta property="og:description" content="<?php echo $photo['description']; ?>" />
<meta property="og:url" content="<?php echo $url; ?>detail.php?id=<?php echo $id; ?>" />
<meta property="og:image" content="<?php echo $canvas_url. 'libs/upload/upload/' .$photo['user_id'] .'/miniatury/' .$photo['name']; ?>" />
<meta property="fb:app_id" content="<?php echo $appId; ?>"/>
<?php

;}
?>
</head>

<body>
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
<?php if(isset($_SESSION['message']))
	{
		echo "<div class='obsah2'><h2>" . $_SESSION['message'] . "</h2></div>";
		unset($_SESSION['message']);
	} ?>
    
    
<div class="obsah">
  <?php

		foreach ($db->getPhotoById($id) as $photo)
		{
			
		echo '<div class="obrazekd">';
		if($db->getPhotoAfterID($id) >0){
			echo '<a href="./detail.php?id='.$db->getPhotoAfterID($id).'"><img src="' .$canvas_url. 'libs/upload/upload/' .$photo['user_id'] .'/original/' .$photo['name'] .'" class="detimg" /></a>';
		}
		else
		{
			echo '<a href="./detail.php?id='.$db->getPhotoFirstID($id).'"><img src="' .$canvas_url. 'libs/upload/upload/' .$photo['user_id'] .'/original/' .$photo['name'] .'" class="detimg" />';
		}

		if($db->getPhotoBeforeID($id) >0){
			echo '<a href="./detail.php?id='.$db->getPhotoBeforeID($id).'" class="doleva"><img src="image/leva.png" title="'._IMGPREV.'"></a>';
		}
		else{
			echo '<a href="./detail.php?id='.$db->getPhotoLastID($id).'" class="doleva"><img src="image/leva.png" title="'._IMGPREV.'"></a>';
		}
		if($db->getPhotoAfterID($id) >0){
			echo '<a href="./detail.php?id='.$db->getPhotoAfterID($id).'" class="doprava"><img src="image/prava.png" title="'._IMGNEXT.'"></a>';
		}
		else
		{
			echo '<a href="./detail.php?id='.$db->getPhotoFirstID($id).'" class="doprava"><img src="image/prava.png" title="'._IMGNEXT.'">';
		}
        $nohtml = htmlentities($photo['description'], ENT_QUOTES, "UTF-8");
						echo '</div>

		<div class="clear"></div>
		</div>';
        $settings = $db->getSettings();
		$end = strtotime($settings[0]['end']);
	if ($end < time())
	{
		echo "<div class='obsah2'><h2><div class=\"hlaska2\">" . _NOMOREVOTING . "</div></h2></div>";
	}
	else
	{
		}
		echo '<div class="obsah">
		<div class="levastrana">
		<div class="ikonad"><a target="_top" href="'. $photo['user_profile'] .'"><img src="https://graph.facebook.com/'. $photo['user_id'] .'/picture" border="0" /></a></div>
		<div class="textautor">
			<strong>'._DTAUTHOR.'</strong><a target="_top" href="'. $photo['user_profile'] .'"> '. $photo['username'] .'</a><br />
			<strong>'._DTCAPTION.'</strong> ' . $photo['photo_name'] . '<br />
			<strong>'._DTDESCRIPTION.'</strong> ' . $nohtml . '
		</div>
		';
		?>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php print(_FBLOCALE); ?>/all.js#xfbml=1&appId=<?php echo $appId; ?>";
  fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));</script>
  <div class="clear"></div>
  <div class="fblikum2">
    <div class="fb-like" data-href="<?php echo $url. 'detail.php?id=' .$id; ?>" data-send="true" data-layout="button_count" data-width="150" data-show-faces="false"></div>
  </div>
</div>
<div class="pravastrana"><span class="cernetlacitko2"><strong><?php echo $photo['rating']; ?></strong> <?php print(_DTVOTES); ?></span>
  <?php
	$settings = $db->getSettings();
		$end = strtotime($settings[0]['end']);
	if ($end < time())
	{
		echo "<div style=\"margin-top:5px;\"></div>";
	}
	else
	{
	?>
  <div style="margin-top:5px;"><a href="./hlasuj.php?id=<?php
	$ini_array = parse_ini_file("libs/config.ini", true);
	$url5 = $ini_array['fb']['CANVAS_URL'];
	$appidus = $ini_array['fb']['API_KEY'];
	$CANVAS_PAGE = $ini_array['fb']['CANVAS_PAGE'];
	echo $id. "&photo=".$photo['photo_name']."&url=" . $CANVAS_PAGE  . "&img=". $url5. 'libs/upload/upload/' .$photo['user_id'] .'/original/' .$photo['name'] . "&desc=" . $photo['description']; ?>" class="zelenetlacitko2"><?php print(_DTVOTE); ?></a></div>
  <?php
	}
	?>
  <script>
FB.init({
appId:'<?php echo $appidus; ?>',
cookie:true,
status:true,
xfbml:true
});

function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
message: '<?php print(_INVITEFB); ?>'
});
}

function FacebookPostToWall()
{
FB.ui({
    method: 'feed',  
    link: '<?php echo $url; ?>detail.php?id=<?php echo $id; ?>',
    name: '<?php echo $photo['photo_name']; ?>',
    caption: '<?php echo $photo['photo_name']; ?>',
    description: '<?php echo $photo['description']; ?>',
    picture: '<?php echo $canvas_url. 'libs/upload/upload/' .$photo['user_id'] .'/miniatury/' .$photo['name']; ?>',
    message: ''
});
}
</script>
  <div id="fb-root"></div>
  <span class="modretlacitko"><a href='#' onclick="FacebookInviteFriends();"> <?php print(_INVITEFBBUTTON); ?> </a></span>
  <div id="fb-root"></div>
  <span class="cervenetlacitko2"><a href='#' onclick="FacebookPostToWall();"> <?php print(_POSTTOWALL); ?> </a></span> </div>
<div class="clear"></div>
</div>
<div class="obsah" style=" max-height:800px; overflow:auto;">
  <div class="fbcomment">
    <div class="fb-comments" data-href="<?php echo $url; ?>detail.php?id=<?php echo $id; ?>" data-num-posts="10" data-width="737"></div>
  </div>
  <?php
		}
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
