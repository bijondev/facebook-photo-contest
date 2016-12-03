<?php 
 $pagesions = basename($_SERVER['SCRIPT_NAME']);
 $zurl = $ini_array['fb']['CANVAS_PAGE'];
 $custompage = $db->getCustompage();
  ?>

<div class="navlinks">
  <span class="navlink<?php if ($pagesions == 'index.php') { ?> active<?php } ?>"><a href="./index.php#top"><?php print(_UPLOADIMAGE); ?></a></span> <span class="navlink<?php if ($pagesions == 'gallery.php') { ?> active<?php } ?>"><a href="./gallery.php"><?php print(_SHOWGALLERY); ?></a></span> <span class="navlink<?php if ($pagesions == 'your_entries.php') { ?> active<?php } ?>"><a href="./your_entries.php#top"><?php print(_MYIMAGES); ?></a></span> <span class="navlink<?php if ($pagesions == 'therms.php') { ?> active<?php } ?>"><a href="./rules.php#top"><?php print(_RULES); ?></a></span>
  <?php
	$poradatel = $db->getPoradatel();
	echo '<span class="navlink"><a target="_blank" href="'.$poradatel[0]['url'] .'">'._ORGANIZER.'</a></span>';
	?>
    <?php if ($custompage[0]['allow']=='1') {
	?>
  <span class="navlink<?php if ($pagesions == 'custompage.php') { ?> active<?php } ?>"><a href="./custompage.php#top"><?php print(_CUSTOMPAGE); ?></a></span>
   <?php } ?>
</div>
