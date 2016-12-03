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
<h2 class="ha2"><?php print(_EDITCUSTOMPAGE); ?></h2>
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
								$custompage = $db->getCustompage();
								?>
                             
                                        
							<form id="formus" name="form" method="post" action="save_custom.php">
<label><?php print(_MENUTITLE); ?></label>
<input type="text" name="name" value="<?php echo $custompage[0]['name'];?>"/>
<br />
<label><?php print(_ALLOW); ?></label>
<br />
<?php print(_ACPYES); ?><input class="radiobutton" type="radio" name="allow" value="1" <?php if ($custompage[0]['allow']=='1') {echo "checked";} ?>/>
<div style="clear:both"></div>
<?php print(_ACPNO); ?><input class="radiobutton" type="radio" name="allow" value="0" <?php if ($custompage[0]['allow']=='0') {echo "checked";} ?>/>
<div style="clear:both"></div>
<label><?php print(_CUSTOMPAGECONTENT); ?></label>
<textarea name="content" id="text2" style="width: 715px;" rows="25"><?php echo $custompage[0]['content'];?></textarea>
<br />
<button type="submit"><?php print(_SAVESETTINGS); ?></button>
</form>


</div>

   <div class="apmenu">

<?php include 'navlinks.php'; ?>


</div>

<?php include_once 'footer.php'; ?>