<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include_once 'header.php';

?>

<?php $event = $db->getEvent(); ?>

<div class="apmenu">
		
<?php include 'navlinks.php'; ?>


</div>

<div class="obsah">
<h2 class="ha2"><?php print(_EDITTERMSPRIZES); ?></h2>
</div>
<?php
								if (isset($_SESSION['message']))
								{
									echo "<div class='obsah2'><h2>" . $_SESSION['message'] . "</h2></div>";
									unset($_SESSION['message']);
								}
								?>

<div class="obsah">
<?php
								$settings = $db->getSettings();
								?>
                                        <form id="formus" name="form" method="post" action="save_rules.php">
										
										
										<textarea name="condition" id="text2" style="width: 715px;" rows="25"><?php echo $settings[0]['condition'];?></textarea>
										
                                       
										<button type="submit"><?php print(_SAVESETTINGS); ?></button>
										<div class="spacer"></div>
										<br />
                                        
									</form>


</div>

   <div class="apmenu">

<?php include 'navlinks.php'; ?>


</div>

<?php include_once 'footer.php'; ?>