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
$canvas_url = $ini_array['fb']['CANVAS_URL'];
$dateformat = $ini_array['date']['dateformat'];

if ($facebook->isFan() === TRUE)
{
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print(_PAGETITLE); ?></title>
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
<?php

	$settings = $db->getSettings();
	$start = strtotime($settings[0]['start']);
	$end = strtotime($settings[0]['end']);
	if ($end > time())
	{
	if ($start < time())
	{



	//overi zda uzivatel nepresahl maximalni pocet fotek
	$hh = $db->getCount();
	if (count($db->getPhoto($facebook->getUser())) < $hh[0]['count'])
	{
		?>
<div id='hlform' class='photocontest '> 
  <script language="JavaScript" type="text/javascript">
		function pocet_znaku () {
			delka=document.form.desc.value.length;
							obsah=document.form.desc.value;
							if (delka<249) {
								document.form.zbyva.value=250-(delka+1);
								document.form.napsano.value=delka+ 1; if (delka==249);}
							if (delka==249){ alert ("<?php print(_MAXCHARACTER); ?> 250");
								return false;}
							if (delka>249){ document.form.desc.value=obsah.substring(0,250);}
						}
	</script>
  <form enctype="multipart/form-data" method="post" name="form" action="libs/upload/save.php" >
    <div class="hlavniformular">
      <div class="formtit"><?php print(_UPLOADPHOTO); ?></div>
      <div class="textpole"><strong class="csipka">1</strong><strong><?php echo $user['name']; ?></strong><span style="width:20px; display:block; float:left; margin-right:5px;"> <img width="18" height="18" src="https://graph.facebook.com/<?php echo $facebook->getUser(); ?>/picture" border="0" alt="<?php echo $user['name']; ?>" /> </span></div>
      <div class="clear"></div>
      <div class="textpole"><strong class="csipka">2</strong>
        <div class="inputrow">
          <label class="nahravani"><?php print(_CHOOSEPHOTO); ?></label>
          <input type="file" name="files[]" />
        </div>
      </div>
      <div class="textpole"><strong class="csipka">3</strong>
        <input type="text" class="zaklhodnota" name="photo_name" placeholder="<?php print(_PHOTONAME); ?>" />
        <span style="color:#F00; margin-left:5px;"><?php print(_REQUIREDFIELD); ?></span></div>
      <div class="textpole"><strong class="csipka">4</strong>
        <div class="poleprodata">
          <div class="poledata"><strong><?php print(_DESCRIPTION); ?></strong> <span style="color:#F00; margin-left:5px;"><?php print(_MAXLENGHT250); ?></span></div>
          <textarea id="custom_2_id" class="polep samos" name="desc" onkeyup="pocet_znaku();"></textarea>
          <p style="clear:both;display: block; padding-top:8px;"><?php print(_LEFT250); ?>
            <input class="zbyvaznaku" name="zbyva" size="2" value="250"/>
            <?php print(_WRITTEN250); ?>
            <input name="napsano" size="2" value="0" class="zbyvaznaku" />
          </p>
        </div>
      </div>
    </div>
    <div class="uploadf"><?php print(_AGREEWITH); ?> <a href="./therms.php"><?php print(_THERMSCONDITIONS); ?></a>.
      <div class="poleprotl">
        <input type="submit" class="zelenacek tlacitko" name="zelenetlacitko" value="<?php print(_UPLOADBUTTON); ?>"/>
      </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $facebook->getUser(); ?>" />
  </form>
</div>
<?php
		}
		else
		{
			echo '<div class="obsah2"><div class="hlaska2">' . _MSGUPLOADLIMIT. '</div></div>';
		}
	}
	else
	{
		echo '<div class="obsah2"><div class="hlaska2">' . _MSGCONTESTSTART. ' ' .$settings[0]['start']. '</div></div>';
	}
		}
	else
	{
		$source = $settings[0]['end'];
		$datum = new DateTime($source);
		echo '<div class="obsah2"><div class="hlaska3">' . _MSGCONTESTHASENDED. ' ' . $datum->format($dateformat) . '</div></div>';
	}
	}
	?>
<div class="clear"></div>
<?php
if ($end > time())
	{
	if ($start < time())
	{
		?>

    <div class="ceny">
    	<?php
    	include "fetured-add.php";
    	?>
    </div>
    <?php

    }
	else
	{
	echo '<div class="ceny"><img src="./image/anotherimage.jpg" alt="" /></div>';	
	}
		}
	else
	{
		
		echo '<div style="background-image: url(image/winner.jpg); width:760px; height:514px;" class="winnerbox">';
	$ini_array = parse_ini_file("./libs/config.ini", true);
							$url = $ini_array['fb']['CANVAS_URL'];
														foreach ($db->getGallery($orderBy = 'photos.rating DESC', $ofsset = 0,1) as $gall)
							{
							echo '<div class="winner">
							<div class="textwinner">' . _WINNERCONTEST. '</div>
							<a target="_parent" href="'. $url .  'detail.php?id=' .$gall['pid'] .'"><img src="' .$url. '/libs/upload/upload/' .$gall['user_id'] .'/original/' .$gall['name'] .'" border="0"></a>
							<div class="textvotes">' .$gall['rating'] .' ' . _VOTESCONTEST. '</div>
							</div>';

							}		
		echo '</div>';
	}
?>

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
