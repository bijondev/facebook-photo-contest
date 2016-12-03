<?php 
 $pagesions = basename($_SERVER['SCRIPT_NAME']);
  ?>

<div class="navlinks2"> <span class="navlink<?php if ($pagesions == 'index.php') { ?> active<?php } ?>"><a href="./index.php"><?php print(_ASETTINGS); ?></a></span> <span class="navlink<?php if ($pagesions == 'galerie.php') { ?> active<?php } ?>"><a href="./galerie.php"><?php print(_APHOTOS); ?></a></span> <span class="navlink<?php if ($pagesions == 'rules.php') { ?> active<?php } ?>"><a href="./rules.php"><?php print(_RULES); ?></a></span> <span class="navlink<?php if ($pagesions == 'privacy.php') { ?> active<?php } ?>"><a href="./privacy.php"><?php print(_PRIVACYPOLICY2); ?></a></span> <span class="navlink<?php if ($pagesions == 'custompage.php') { ?> active<?php } ?>"><a href="./custompage.php"><?php print(_CUSTOMPAGE); ?></a></span> <span class="navlink"><a href="./login.php?logout=yes"><?php print(_LOGOUT); ?></a></span> </div>
