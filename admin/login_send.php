<?php
session_start();

if (isset($_POST['user'], $_POST['pass']))
{
	$ini_array = parse_ini_file("../libs/config.ini", true);
	$user = $ini_array['admin']['user'];
	$pass = $ini_array['admin']['pass'];



	if ($user == htmlspecialchars($_POST['user']) and $pass == htmlspecialchars($_POST['pass']) )
	{
		$_SESSION['user'] = $user;
		header("location:index.php");
	}
	else
	{
		header("location:login.php?error=yes");
	}
}

