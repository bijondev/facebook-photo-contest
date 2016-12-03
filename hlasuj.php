<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
include('./libs/secure.php');
include 'language/language.php';

	$settings = $db->getSettings();

	$end = strtotime($settings[0]['end']);
	if ($end < time())
	{
		exit;
	}


	$id = $_GET['id'];
	if (!is_numeric($id))
	{
		exit;
	}

	$isRated = $db->selectRating($id, $facebook->getUser());

	if ($isRated == 0)
	{
		$db->saveRating($id, $facebook->getUser());
			$hh = $db->getEvent();

		$_SESSION['message'] = '<div class="hlaska3">'._VOTESUCCESS.'</div>';
		$wall_post_attachment = array(
						'message' => ''.$user['name'].' '._JUSTVOTED.' „' .$hh[0]['event'].'“',
						 'name' => ''.$_GET['photo'].'',
						 'link' => ''.$_GET['url'].'detail.php?id='.$id.'',
						 'description' => ''. $_GET['desc'] .'',
			             'caption' => _APPNAME,
						'picture' => ''. $_GET['img'] .'');

		try {
		// Odešleme Wallpost pomocí Graph API na Facebook
		$result = $facebook->api('/me/feed/', 'POST', $wall_post_attachment);
		} catch (FacebookApiException $e) {
		echo _ERRORMSG . $e->getMessage();
		}
	}
	else
	{
		$_SESSION['message'] = '<div class="hlaska2">'._ERRVOTED.'</div>';
	}

	header("location:./detail.php?id=$id");

?>