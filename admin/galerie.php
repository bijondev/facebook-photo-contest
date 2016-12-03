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
<h2 class="ha2"><?php print(_IMAGEMANAGEMENT); ?></h2>
</div>
<div class="obsah">

                            <form method="post" id="searchform" action="search.php">

                            <input type="text"  name="search"  id="s" class="searchadm" placeholder="<?php print(_SEARCHIMAGE); ?>"/>

                           <input type="submit" id="submit" value="<?php print(_SEARCHBUTTON); ?>"  style="width:70px;"/>

                           </form>
                                        
                                       
</div>


                               <?php
								if (isset($_SESSION['message']))
								{
									echo "<div class='obsah2'><h2>" . $_SESSION['message'] . "</h2></div>";
									unset($_SESSION['message']);
								}
								?>
<div class="obsah">
<h2 class="ha2" style="height:20px;"><?php print(_ALLENTRIES); ?></h2>

<?php print(_ORDEREDBY); ?> :: <a href="./galerie.php?order_by=id_desc" <?php if (!isset($_GET['order_by']) or $_GET['order_by']=='id_desc' ){echo 'class="aktivnirazeni"';}?>><?php print(_NEWEST); ?></a> ::
	<a href="./galerie.php?order_by=id_asc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='id_asc'){echo 'class="aktivnirazeni"';}?>><?php print(_OLDEST); ?></a> ::
	<a href="./galerie.php?order_by=rating_desc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='rating_desc'){echo 'class="aktivnirazeni"';}?> ><?php print(_MOSTVOTES); ?></a> ::
	<a href="./galerie.php?order_by=rating_asc" <?php if (isset($_GET['order_by']) && $_GET['order_by']=='rating_asc'){echo 'class="aktivnirazeni"';}?>><?php print(_LEASTVOTES); ?></a> ::


<table id="tabulka">
<thead>
<th width="30"><?php print(_ENTRIESID); ?></th>
<th width="30"><?php print(_ENTRIESIMAGES); ?></th>
<th width="30"><?php print(_ENTRIESVOTES); ?></th>
<th><?php print(_PHOTONAME); ?></th>
<th width="150"><?php print(_ENTRIESUSER); ?></th>
<th width="50"><?php print(_ACPEDIT); ?></th>
<th width="50"><?php print(_ACPDELETE); ?></th>
</thead>
<tbody>

			<?php
		$ini_array = parse_ini_file("../libs/config.ini", true);
		$url = $ini_array['fb']['CANVAS_URL'];
		$order = array(
			'id_desc' => 'photos.id DESC',
			'id_asc' => 'photos.id ASC',
			'rating_desc' => 'photos.rating DESC',
			'rating_asc' => 'photos.rating ASC'
		);

		if (isset($_GET['order_by']) && array_key_exists(''.$_GET['order_by'].'', $order))
  {
   $orderBy = $order[$_GET['order_by']];
  }
  else
  {
   $orderBy = 'photos.id DESC';
  }
		if (isset($_GET['offset']) && is_numeric($_GET['offset']))
		{
			$offset = $_GET['offset'];
		}
		else
		{

			$offset = 0;
		}

		 $hh = $db->getImgPerPage();
		$limit = 10;

		$url = $ini_array['fb']['CANVAS_URL'];
		$canvas_url = $ini_array['fb']['CANVAS_URL'];


		foreach ($db->getGallery($orderBy, $offset, $limit) as $gall)
		{
			echo '
			
<tr>
<td>' .$gall['pid'] .'</td>
<td><a href="edit.php?id=' .$gall['pid'] .'"><img src="' .$url. '/libs/upload/upload/' .$gall['user_id'] .'/miniatury/' .$gall['name'] .'"  width="30" height="30" align="left"></a></td>
<td>' .$gall['rating'] .'</td>
<td>' .$gall['photo_name'] .'</td>
<td><a target="_blank" href="'. $gall['user_profile'] .'">' .$gall['username'] .'</a></td>
<td><a href="edit.php?id=' .$gall['pid'] .'">'._ACPEDIT.'</a></td>
<td><a href="del.php?id=' .$gall['pid'] .'">'._ACPDELETE.'</a></td>
</tr>';
		

		}
	?>
    </tbody></table>
<div style="clear:both"></div>

<ul class="strankovani">

<?php


$pages = ceil($db->countImages()/$limit);

if (isset($_GET['page']) and is_numeric($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 1;
}

	if (isset($_GET['order_by']))
		{
		$oderBy = "?order_by=" .$_GET['order_by'] ."";
		}
		else
		{
			$oderBy = "?order_by=id_desc";
		}


$i = $page - 1;
if ($i >= 1)
{
	$u = ($i * $limit) - $limit;
	echo "<li><a href='./galerie.php$oderBy&offset=$u&page=$i'>" ._IMGPREV."</a></li>
	";
}


for ($i = 1; $i <= $pages; $i++)
{
	$u = ($i * $limit) - $limit;

		if ($page == $i)
		{
			echo "<li><a href='./galerie.php$oderBy&offset=$u&page=$i' class=\"aktualni\">$i</a></li>
			";
		}
		else
		{
			echo "<li><a href='./galerie.php$oderBy&offset=$u&page=$i'>$i</a></li>
			";
		}


}

$icko = $i;
$i = $page + 1;

if ($i != $icko)
{
	$u = ($i * $limit) - $limit;
	echo "<li><a href='./galerie.php$oderBy&offset=$u&page=$i'>" ._IMGNEXT."</a></li>
	";
}
	?>
    </ul>
    <div style="clear:both"></div>
</div>


   <div class="apmenu">

<?php include 'navlinks.php'; ?>


</div>


<?php include_once 'footer.php'; ?>