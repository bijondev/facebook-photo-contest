<?php 
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
if (!isset($_SESSION['user']))
{
	header("location:./login.php");
	exit;
}
include '../libs/myDb.php';
include '../language/language.php';

$id = $_GET['id'];

$db = new myDb;

$photo = $db->getPhotoByID($id);
$miniatura = '../libs/upload/upload/' .$photo[0]['user_id'] . '/original/' .$photo[0]['name'] . '';
$original = '../libs/upload/upload/' .$photo[0]['user_id'] . '/miniatury/' .$photo[0]['name'] . '';

if (!file_exists($miniatura))
{
	unlink($miniatura);
}
if (!file_exists($original))
{
	unlink($original);
}



if ($db->deleteImage($id))
{
	$_SESSION['message'] = "<div class=\"hlaska3\">" ._DELETESUCCESS."</div>";
}
else
{
	$_SESSION['message'] = "<div class=\"hlaska\">" ._DELETEERROR."</div>";
}



header("location:./galerie.php");
?>