<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar

require_once 'dibi/dibi.php';

class myDb
{
	private $ini_array = array();

	public function __construct()
	{
		$ini_array = parse_ini_file("config.ini", true);
		dibi::connect($ini_array['database']
			);

	}

	public function getUser($id)
	{
		return dibi::select('*')
				->from('users')
				->where('id = %i', $id)
				->fetchAll();
	}

	public function setUser(array $user)
	{
		return dibi::query('INSERT INTO [users]', $user);
	}

	/*
	 * select by user_id
	 */
	public function getPhoto($id)
	{
		return dibi::select('*')
			->from('photos')
			->where('user_id = %i', $id)
			->fetchAll();
	}

	public function getPhotoByID($id)
	{
		return dibi::select('*')
		->from('photos')
		->innerJoin('users')
		->on('users.id = photos.user_id')
		->where('photos.id = %i', $id)
		->fetchAll();
	}
	public function getPhotoBeforeID($id)
	{
		return dibi::select('photos.id')
		->from('photos')
		->where('photos.id < %i', $id)
		->orderBy('photos.id desc')
		->fetchSingle();
	}

		public function getPhotoAfterID($id)
	{
		return dibi::select('photos.id')
		->from('photos')
		->where('photos.id > %i', $id)
		->orderBy('photos.id asc')
		->fetchSingle();
	}


		public function getPhotoLastID($id)
	{
		return dibi::select('photos.id')
		->from('photos')
		->orderBy('photos.id DESC')
		->fetchSingle();
	}
		public function getPhotoFirstID($id)
	{
		return dibi::select('photos.id')
		->from('photos')
		->orderBy('photos.id ASC')
		->fetchSingle();
	}

	public function getPhotoByUser($id)
	{
		return dibi::select('*, photos.id as pid')
		->from('photos')
		->innerJoin('users')
		->on('users.id = photos.user_id')
		->where('photos.user_id = %i', $id)
		->fetchAll();
	}

	public function insertPhoto(array $args)
	{
		return dibi::query('INSERT INTO [photos]', $args);
	}
	public function updatePhoto($id, array $args)
	{
		return dibi::query('UPDATE [photos] SET', $args, 'WHERE id = %i', $id);
	}

	public function getGallery($orderBy = 'photos.id DESC', $ofsset = 0, $limit = 14)
	{
		return dibi::select('*, photos.id as pid')
			->from('photos')
			->innerJoin('users')
			->on('users.id = photos.user_id')
			->orderBy($orderBy)
			->fetchAll($ofsset, $limit);
	}
	

	public function countImages()
	{
		return dibi::select('*')
			->from('photos')
			->count();
	}

	public function selectRating($photo_id, $user_id)
	{
		return dibi::select('*')
			->from('rating')
			->where('user_id = %i AND photo_id = %i', $user_id, $photo_id)
			->count();
	}

	public function saveRating($photo_id, $user_id)
	{
		if(dibi::query('INSERT INTO [rating]', array('user_id' => $user_id, 'photo_id' => $photo_id)))
		{
			return dibi::query('UPDATE [photos] SET rating = rating + 1 WHERE `id`=%i', $photo_id);
		}
	}

	public function getRules()
	{
		return dibi::select('condition')
			->from('settings')
			->fetchAll();
	}
	public function getFaq()
	{
		return dibi::select('faq')
			->from('settings')
			->fetchAll();
	}
	public function getTracking()
	{
		return dibi::select('tracking')
			->from('settings')
			->fetchAll();
	}
	public function getPrivacy()
	{
		return dibi::select('privacy')
			->from('settings')
			->fetchAll();
	}

	public function getPoradatel()
	{
		return dibi::select('url')
			->from('settings')
			->fetchAll();
	}

		public function getCount()
	{
		return dibi::select('count')
			->from('settings')
			->fetchAll();
	}
			public function getImgPerPage()
	{
		return dibi::select('img_per_page')
			->from('settings')
			->fetchAll();
	}

	public function getEvent()
	{
		return dibi::select('event')
			->from('settings')
			->fetchAll();
	}

	public function getOrganizer()
	{
		return dibi::select('*')
			->from('organizer')
			->fetchAll();
	}


	/*
	 * Admin
	 */

	public function login($user, $pass)
	{
		return dibi::select('*')
			->from('admin')
			->where('user = %s AND pass = %s', $user, $pass)
			->count();
	}

	public function countRating()
	{
		return dibi::select('*')
			->from('rating')
			->count();
	}

	public function updateCustompage($args)
	{
		return dibi::update('custompage', $args)
			->execute();
	}
	public function updateSettings($args)
	{
		return dibi::update('settings', $args)
			->execute();
	}
	public function getSettings()
	{
		return dibi::select('*')
			->from('settings')
			->fetchAll();
	}
	public function getCustompage()
	{
		return dibi::select('*')
			->from('custompage')
			->fetchAll();
	}

	public function deleteImage($id)
	{
		dibi::delete('rating')
			->where('photo_id = %i', $id)
			->execute();
		return dibi::delete('photos')
			->where('id = %i', $id)
			->execute();
	}

	public function searchGallery($search)
	{
		return dibi::select('*, photos.id as pid')
			->from('photos')
			->innerJoin('users')
			->on('users.id = photos.user_id')
			->where('photos.photo_name = %s', $search)
			->fetchAll();
	}

	public function getUserByName($name)
	{
		return dibi::select('id')
			->from('users')
			->where('username = %s', $name)
			->fetchAll();
	}

	public function searchGalleryByUser($id)
	{
		return dibi::select('*, photos.id as pid')
			->from('photos')
			->innerJoin('users')
			->on('users.id = photos.user_id')
			->where('photos.user_id = %i', $id)
			->fetchAll();
	}



}
