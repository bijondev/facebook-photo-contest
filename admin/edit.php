<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include_once 'header.php';
$id = $_GET['id'];
?>

<?php $event = $db->getEvent(); ?>

<div class="apmenu">
		
<?php include 'navlinks.php'; ?>


</div>

<div class="obsah">
<h2 class="ha2"><?php print(_IMAGEMANAGEMENT); ?></h2>
</div>

<div class="obsah">

                                <?php
								$photo = $db->getPhotoById($id);
								$nohtml = htmlentities($photo[0]['description'], ENT_QUOTES, "UTF-8");
								
								
								echo '<div class="obrazekd"><img src="../libs/upload/upload/' .$photo[0]['user_id'] .'/original/' .$photo[0]['name'] .'" class="detimg" /></div>';
								?>
                               
								<div id="stylized" class="myform">
									<form id="formus" name="form" method="post" action="save_edit.php">
										<h2><?php print(_ACPEDIT); ?></h2>
                                        <label>Autor: <?php echo $photo[0]['username'];?></label>
                                        <br />
										<label><?php print(_PHOTONAME); ?></label>
										<input type="text" value="<?php echo $photo[0]['photo_name'];?>" name="photo_name" id="name" />
										<br />
                                        <label>Rating</label>
										<input type="text" value="<?php echo $photo[0]['rating'];?>" name="rating" id="name" />
                                        <br />
										<label><?php print(_DESCRIPTION); ?></label>
										<textarea name="desc" id="text77" style="width: 714px;" rows="13"><?php echo $nohtml;?>
										</textarea>
										<input type="hidden" name="id" value="<?php echo $id;?>" />
										<br />
										<button type="submit"><?php print(_ACPEDIT); ?></button>
										<div class="spacer"></div>
										<br />
									</form>
								</div>


<div style="clear:both"></div>
</div>


   <div class="apmenu">

<?php include 'navlinks.php'; ?>


<?php include_once 'footer.php'; ?>