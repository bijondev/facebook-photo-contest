<?php

/*
 * @author Josef Kuchar www.web-reseni.cz
 */

require_once "facebook.php";

class myFb extends Facebook
{
	private $ini_array = array();

	public function __construct()
	{
		$this->ini_array = parse_ini_file("config.ini", true);

		$config = array(
			'appId' => $this->ini_array['fb']['appId'],
			'secret' => $this->ini_array['fb']['APP_SECRET'],
			'fileUpload' => TRUE
			);
		parent::__construct($config);
	}


	public function isFan()
	{
		$like = $this->api('/me/likes/' . $this->ini_array['fb']['PAGE_TO_LIKE'], 'get');
		if (isset($like['data'][0]))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function isLogged()
	{
		// Získáme ID uživatele
		$user = $this->getUser();

		// Je uživatel přihlášený na Facebooku?
		if (isset($user))
		{
			try
			{
				$this->api('/me');
				return TRUE;

			}
			catch (FacebookApiException $e)
			{
				$this->redirect();
			}
		}
		else
		{
			$this->redirect();
		}

	}

	public function getUserProfile()
	{
		if($this->isLogged() === TRUE)
		{
			return $this->api('/me');
		}
		else
		{
			echo 'ssssssssss';
		}

	}

	public function najdi_id($link)
	{
		$pos = strrpos($link, "/");
		$link = substr("$link", $pos + 1);
		return $link;
	}


	public function redirect()
	{
		$detail =  $this->najdi_id($_SERVER['REQUEST_URI']);
		//presmerujeme na stranku s autorizaci
		$redirect_uri = $this->ini_array['fb']['CANVAS_PAGE'] .$detail;
		$login_url = $this->getLoginUrl(array("scope" => $this->ini_array['fb']['EXTENDED_PERSMISSIONS'], "redirect_uri" => $redirect_uri));
		echo("<script> top.location.href='" . $login_url . "'</script>");
		exit;
	}

}

?>
