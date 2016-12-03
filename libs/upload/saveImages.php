<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * @copyright Josef Kuchař | web-reseni.cz
 */
require_once('string.php');
require_once('Image.php');

/**
 * uklada obrazky
 */
class saveImages
{


	/**
	 * @param array $tmpFiles pole souboru
	 * @param int $id id zaznamu v db, ke kteremu patri obrazek
	 */
	public function __construct(array $tmpFiles, $id)
	{
		if (empty($tmpFiles) || !is_numeric($id))
		{
			return FALSE;
		}
		$this->tmpFiles = $tmpFiles;
		$this->id = $id;
	}


	/**
	 * ulozi original a vytvori miniaturu
	 *
	 * @param string $dir cesta k cilovemu adresari s obrazky
	 * @param string $originalsDir slozka s originaly obrazku
	 * @param string $thumbnailsDir slozka s miniatury obrazku
	 * @param int $thumbnailsWidth sirka nahledu obrazku
	 *
	 * @return bool
	 */
	public function save(
		$dir = './upload/', $originalsDir = '/original/', $thumbnailsDir = '/miniatury/', $thumbnailsWidth = 105
		)
	{
		$images = $this->convertToImagesArray();
		if ($images != FALSE)
		{
			$this->saveOriginal($images, $dir, $originalsDir);
			$this->saveThumbnails($images, $dir, $thumbnailsDir, $thumbnailsWidth);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


	/**
	 * ulozi originalni obrazky
	 *
	 * @param array $images pole obrazku, ziskane metodou convertToImagesArray()
	 * @param string $dir cesta k adresari s obrazky
	 * @param string $subdir slozka s originaly obrazku
	 *
	 * @return void
	 */
	public function saveOriginal(array $images, $dir = './upload/', $subdir = '/original/', $width = 1200)
	{
		foreach ($images as $image)
		{
			if (!file_exists($dir . $this->id . '/') && $this->id !='')
			{
				mkdir($dir . $this->id . '/', 0755);
			}
			if (!file_exists($dir . $this->id . $subdir))
			{
				mkdir($dir . $this->id . $subdir, 0755);
			}

			$img = Image::fromFile($image['tmp_name']);
			$img->resize(1200, NULL, Image::SHRINK_ONLY);
			$img->sharpen();
			$img->save($dir . $this->id . $subdir . $image['name']);
			
		}
	}


	/**
	 * ulozi miniatury obrazku
	 *
	 * @param array $images pole obrazku, ziskane metodou convertToImagesArray()
	 * @param string $dir cesta k adresari s obrazky
	 * @param string $subdir slozka s miniatury obrazku
	 * @param int $width sirka nahledu obrazku
	 *
	 * @return void
	 */
	public function saveThumbnails(array $images, $dir = './upload/', $subdir = '/miniatury/', $width = 200)
	{
		foreach ($images as $image)
		{
			if (!file_exists($dir . $this->id . '/') && $this->id !='')
			{
				mkdir($dir . $this->id . '/', 0755);
			}
			if (!file_exists($dir . $this->id . $subdir))
			{
				mkdir($dir . $this->id . $subdir, 0755);
			}

			$img = Image::fromFile($image['tmp_name']);
			$img->resize(200, 200, Image::EXACT);
			$img->sharpen();
			$img->save($dir . $this->id . $subdir . $image['name']);
		}
	}


	/**
	 * prevede pole souboru na pole obrazku
	 * empty array = zadny soubor nebyl typu image
	 * FALSE = pole se soubory je prazdne
	 *
	 * @return $files array | FALSE
	 */
	public function convertToImagesArray()
	{
		if (count($this->tmpFiles['name']) != 0)
		{
			$files = array();
			for ($i = 0; $i < count($this->tmpFiles['name']); $i++)
			{
				// overi zda se jedna o soubor typu image a ulozi do pole
				if (exif_imagetype($this->tmpFiles['tmp_name'][$i]) !== FALSE)
				{
					$files[] = array(
						'name' => $this->tmpFiles['name'][$i],
						'tmp_name' => $this->tmpFiles['tmp_name'][$i]
					);
				}
			}
			return $files;
		}
		else
		{
			return FALSE;
		}
	}


	/**
	 * smaze soubory z tmp
	 *
	 * @return void
	 */
	function __destruct()
	{
		foreach ($this->tmpFiles['tmp_name'] as $tmpFile)
		{
			unlink($tmpFile);
		}
	}


}