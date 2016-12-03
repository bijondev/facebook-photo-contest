<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
session_start();
include '../language/language.php';
if (!isset($_SESSION['user']))
{
 header("location:./login.php");
 exit;
}
include '../libs/myDb.php';


$desc = $_POST['desc'];

$db = new myDb;
$update = array(
   'photo_name' => $_POST['photo_name'],
   'description' => $_POST['desc'],
   'rating' => $_POST['rating'],
  );
if ($db->updatePhoto($_POST['id'], $update))
{
 $_SESSION['message'] = "<div class=\"hlaska3\">"._SUCCESSEDIT."</div>";
}
else
{
 $_SESSION['message'] = "<div class=\"hlaska\">"._ERROREDIT."</div>";
}

 header("location:./galerie.php");


?>