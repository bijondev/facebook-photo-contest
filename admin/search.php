<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include_once 'header.php';

?>

<?php $event = $db->getEvent(); ?>

<div class="apmenu">
		<div class="titulekapp"><?php print(_ADMINCP); ?></div>
<?php include 'navlinks.php'; ?>


</div>

<div class="obsah">
<h2 class="ha2">Spravování obrázků</h2>
</div>

<div class="obsah">

                            <form method="post" id="searchform" action="search.php">

                            <input type="text"  name="search"  id="s" class="searchadm" placeholder="<?php print(_SEARCHIMAGE); ?>"/>

                           <input type="submit" id="submit" value="<?php print(_SEARCHBUTTON); ?>"  style="width:70px;"/>

                           </form>
                                        
                                       
</div>
<div class="obsah">
<h2 class="ha2" style="height:20px;"><?php print(_SEARCHRESULTS); ?></h2>

<?php
							$ini_array = parse_ini_file("../libs/config.ini", true);
							$url = $ini_array['fb']['CANVAS_URL'];
							$search = $_POST['search'];

							$result = $db->searchGallery($search);

							if(empty($result))
							{
								$result = $db->getUserByName($search);

								if(!empty($result))
								{
									foreach ($result as $user)
									{
										$result = $db->searchGalleryByUser($user['id']);
										foreach ($result as $gall)
										{
										echo '
											<div class="boxum2">
											<a href="images/velky.jpg" class="highslide" onclick="return hs.expand(this)"><img src="' .$url. '/libs/upload/upload/' .$gall['user_id'] .'/miniatury/' .$gall['name'] .'"  width="90" height="90" align="left"></a>
											<div style="height:75px;">
											<strong>' ._DTCAPTION.' obrázku:</strong>' .$gall['photo_name'] .'<br />
											<strong>' ._DTAUTHOR.' </strong>' .$gall['username'] .'<br />
											<strong>' ._DTDESCRIPTION.' </strong>' .substr($gall['description'], 0, 200) .'.
											<br />
											</div>
										   <span class="spanel1"><a href="edit.php?id=' .$gall['pid'] .'">'._ACPEDIT.'</a></span> - <span class="spanel2"><a href="del.php?id=' .$gall['pid'] .'">'._ACPDELETE.'</a></span>
											<div style="clear:both"></div>
											</div>
										';

										}
									}
								}
								else
								{
									echo '<ul><li class=\"error\">' ._SEARCHNORESULTS.'</li></ul>';
								}


							}
							else
							{
							foreach ($result as $gall)
							{
							$nohtml = htmlentities($gall['description'], ENT_QUOTES, "UTF-8");
							echo '
								<div class="boxum2">
								<a href="edit.php?id=' .$gall['pid'] .'"><img src="' .$url. '/libs/upload/upload/' .$gall['user_id'] .'/miniatury/' .$gall['name'] .'"  width="90" height="90" align="left"></a>
								<div style="height:75px;">
								<strong>' ._DTCAPTION.' </strong>' .$gall['photo_name'] .'<br />
								<strong>' ._DTAUTHOR.' </strong>' .$gall['username'] .'<br />
								<strong>' ._DTDESCRIPTION.' </strong>' .substr($nohtml, 0, 200) .'.
								<br />
								</div>
							   <span class="spanel1"><a href="edit.php?id=' .$gall['pid'] .'">'._ACPEDIT.'</a></span> - <span class="spanel2"><a href="del.php?id=' .$gall['pid'] .'">'._ACPDELETE.'</a></span>
								<div style="clear:both"></div>
								</div>
							';

							}
							}





							?>
<div style="clear:both"></div>
</div>


   <div class="apmenu">
<div class="titulekapp"><?php print(_ADMINCP); ?></div>
<?php include 'navlinks.php'; ?>


</div>


<?php include_once 'footer.php'; ?>