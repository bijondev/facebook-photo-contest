<?php
//Photo Contest Facebook APP
//Created and Copyright Zbynek Hovorka
//Official FB page - https://www.facebook.com/pages/Photo-Contest-FB-App/457225521028147
//Special Thanks - Josef Kuchar
include_once 'header.php';
if (isset($_SESSION['message']))
	{
		//echo '<h1>' . $_SESSION['message'] . '</h1>';
		unset($_SESSION['message']);
	}

?>

<?php $event = $db->getEvent(); ?>

<div class="apmenu">
		<div class="titulekapp"><?php print(_ADMINCP); ?></div>
<?php include 'navlinks.php'; ?>


</div>

<div class="obsah">
<h2 class="ha2"><?php print(_EDITFAQ); ?></h2>
</div>

<div class="obsah">
<?php
								$settings = $db->getSettings();
								?>
                                        <form id="formus" name="form" method="post" action="save_settings.php">
										<div style="display:none">

										
										<input type="text" value="<?php echo $settings[0]['start'];?>" name="start" id="name" />
										
									
										<input type="text" value="<?php echo $settings[0]['end'];?>" name="end" id="name" />
										
										<input type="text" value="<?php echo $settings[0]['event'];?>" name="event" id="name" />
									
										<select name="count">
											<option><?php echo $settings[0]['count'];?></option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
										</select>
										
										<input type="text" value="<?php echo $settings[0]['url'];?>" name="url" id="password" style="width:500px;" />
										
										<select name="img_per_page">
											<option><?php echo $settings[0]['img_per_page'];?></option>
											<option>8</option>
                                            <option>12</option>
											<option>16</option>
											<option>20</option>
										</select>
										
										<textarea name="condition" id="text2" style="width: 620px;"><?php echo $settings[0]['condition'];?></textarea>
										
                                        </div>
                                        <textarea name="faq" id="text3" style="width: 715px;" rows="22"><?php echo $settings[0]['faq'];?></textarea>
									
                                        <div style="display:none">
                                       
										<textarea name="privacy" id="text4" style="width: 620px;"><?php echo $settings[0]['privacy'];?></textarea>
										
										<textarea name="tracking" id="text5" style="width: 620px;" rows="3"><?php echo $settings[0]['tracking'];?></textarea>
									
                                        
                                        </div>
										<button type="submit"><?php print(_SAVESETTINGS); ?></button>
										<div class="spacer"></div>
										<br />
                                        
									</form>


</div>

   <div class="apmenu">
<div class="titulekapp"><?php print(_ADMINCP); ?></div>
<?php include 'navlinks.php'; ?>


</div>

<?php include_once 'footer.php'; ?>