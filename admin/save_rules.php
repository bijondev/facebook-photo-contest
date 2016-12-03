<?php 
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include '../language/language.php';
ini_set('display_errors', '1');
if (!isset($_SESSION['user']))

 session_start();
if (!isset($_SESSION['user']))
{
	header("location:./login.php");
	exit;
}
include '../libs/myDb.php';


$db = new myDb;
$update = array(

			'condition' => $_POST['condition'],

		);
if ($db->updateSettings($update))
{
	$_SESSION['message'] = "<div class=\"hlaska3\">"._SUCCESSSAVE."</div>";
	header("location:./rules.php");
	
}
else
	{   $_SESSION['message'] = "<div class=\"hlaska3\">"._SUCCESSSAVE."</div>";
		header("location:./rules.php");
	}


?>