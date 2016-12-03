<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
ini_set('display_errors', 0);
include('../secure.php');
include '../../language/language.php';

if (isset($_FILES['files'], $_POST['photo_name'], $_POST['user_id']))
{

	$desc =  htmlspecialchars($_POST['desc']);
	$desc = substr($desc, 0, 250);
	$user_id = $_POST['user_id'];
	$files = $_FILES['files']['name']['0'];


	if ($_FILES['files']['name'][0]=="")
	{
		$_SESSION['message'] = '<div class="hlaska">' ._ERRNOIMAGE. '</div>';
		header("location:../../index.php");
		exit;
	}

	if (exif_imagetype($_FILES['files']['tmp_name'][0]) === FALSE)
	{
		$_SESSION['message'] = '<div class="hlaska">' ._ERRWRONGFILEFORMAT. '</div>';
		header("location:../../index.php");
		exit;

	}
	$photo_name = htmlspecialchars($_POST['photo_name']);

	if ($photo_name =="")
	{
		$_SESSION['message'] = '<div class="hlaska">' ._ERRPHOTOTITLE. '</div>';
		header("location:../../index.php");
		exit;
	}


	if ($db->insertPhoto(array(
		'user_id' => $user_id ,
		'description' => $desc,
		'name' => $files,
		'photo_name' => $photo_name,
	)) === 1)
	{
		$id_slozky = $user_id;

		//ulozeni obrazku
		include_once './saveImages.php';
		if (isset($_FILES['files']) && is_array($_FILES['files']))
		{
			$saveImages = new saveImages($_FILES['files'], $id_slozky);
			if($saveImages->save() === TRUE)
			{
				$_SESSION['message'] = '<div class="hlaska3">' ._SUCCESUPLOAD. '</div>';

					$ini_array = parse_ini_file("../config.ini", true);
					$url = $ini_array['fb']['CANVAS_URL'];
					$img_id = mysql_insert_id();
					$hh = $db->getEvent();
					$img = $url. '/libs/upload/upload/' .$id_slozky. '/miniatury/' .$_FILES['files']['name']['0'];
					$link = $ini_array['fb']['CANVAS_PAGE'] . '/detail.php?id='.$img_id.'';
					$wall_post_attachment = array(
						'message' => ''.$user['name'].' ' ._JOININGCONTEST. '  „'.$hh[0]['event'].'“',
						 'name' => $photo_name,
						 'link' => ''.$link.'',
						 'description' => $desc,
						'caption' => _APPNAME,
						'picture' => ''. $img .'');

					  try {
					  // Odešleme Wallpost pomocí Graph API na Facebook
					  $result = $facebook->api('/me/feed/', 'POST', $wall_post_attachment);
					  } catch (FacebookApiException $e) {
					  echo _ERRUPLOAD . $e->getMessage();
					  }


			}
			else
			{
				$_SESSION['message'] = '' ._ERRUPLOAD. '';
			}
		}

		header("location:../../gallery.php");
	}
	else
	{
		$_SESSION['message'] .= '' ._ERRUPLOAD. '';
		header("location:../../index.php");
	}
}
else
{
	$_SESSION['message'] .= '' ._ERRUPLOAD. '';
	header("location:../../index.php");
}

