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
<h2 class="ha2"><?php print(_STATISTICS); ?></h2>
									<strong><?php print(_TOTALIMAGES); ?></strong> <?php echo $db->countImages(); ?><br />
									<strong><?php print(_TOTALVOTES); ?></strong> <?php echo $db->countRating(); ?><br />
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
<form id="formus" name="form" method="post" action="save_settings.php">
										<h2 class="ha2"><?php print(_ASETTINGS); ?></h2>

										<label><?php print(_STARTDATE); ?>
										</label>
										<input type="text" value="<?php echo $settings[0]['start'];?>" name="start" id="name" />
										<br />
										<label><?php print(_ENDDATE); ?>
										</label>
										<input type="text" value="<?php echo $settings[0]['end'];?>" name="end" id="name" />
										<br />

										<label><?php print(_CONTESTTITLE); ?></label>
										<input type="text" value="<?php echo $settings[0]['event'];?>" name="event" id="name" />
										<br />
										<label><?php print(_IMAGESPERUSER); ?></label>
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
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>15</option>
                                            <option>20</option>
                                            <option>30</option>
										</select>
										<br />
										<label><?php print(_LINKORGANIZER); ?></label>
										<input type="text" value="<?php echo $settings[0]['url'];?>" name="url" id="password" />
										<br />
										<label><?php print(_IMAGESPERPAGE); ?></label>
										<select name="img_per_page">
											<option><?php echo $settings[0]['img_per_page'];?></option>
											<option>8</option>
                                            <option>12</option>
											<option>16</option>
											<option>20</option>
										</select>
										<br />
                                        <div style="display:none">
										
										<textarea name="condition" id="text2" style="width: 620px;"><?php echo $settings[0]['condition'];?></textarea>
										<br />
                                        
										<textarea name="privacy" id="text4" style="width: 620px;"><?php echo $settings[0]['privacy'];?></textarea>
										<br />
                                        </div>
                                        <label><?php print(_TRACKINGCODE); ?></label>
										<textarea name="tracking" id="text5" style="width: 705px;" rows="10"><?php echo $settings[0]['tracking'];?></textarea>
										<br />
										<button type="submit"><?php print(_SAVESETTINGS); ?></button>
										<div class="spacer"></div>
										<br />
									</form>


</div>

   <div class="apmenu">

<?php include 'navlinks.php'; ?>


</div>

<?php include_once 'footer.php'; ?>