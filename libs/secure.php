<?php
session_start();
// FB knihovna a db
require_once 'myFb.php';
require_once 'myDb.php';


// Vytvoříme instanci Facebook knihovny a db
$facebook = new myFb();
$db = new myDb();
$user = $facebook->getUserProfile();

//najde uzivatele v db
$dbUser = $db->getUser($facebook->getUser());

//prida data o uzivateli do db
if (empty($dbUser))
{
	$user_link = $facebook->api('/me?fields=link', 'get');
	$db->setUser(
		array(
			'id' => $facebook->getUser(),
			'username' => $user['name'],
			'user_profile' => ''.$user_link['link'].'',
		)
	);
	$dbUser[0] = array(
		'id' => $facebook->getUser(),
		'username' => $user['name'],
		'photo' => ''
	);
}

if ($facebook->isFan() === FALSE)
{
	$ini_array = parse_ini_file("config.ini", true);
	$appId = $ini_array['fb']['appId'];
	$PAGE_TO_LIKE_URL = $ini_array['fb']['PAGE_TO_LIKE_URL'];

	?>
<!doctype html><html xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body onLoad="like();">
			
			<script>
				function like()
				{
					FB.Event.subscribe('edge.create',
					function(response) {
						document.location.reload(true);
					}
				);
				}
			</script>
			<div id="fb-root"></div>
	<script>
				(function(d, s, id)
				{
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/<?php print(_FBLOCALE); ?>/all.js#xfbml=1&appId=<?php echo $appId; ?>";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk')
			);
			</script>
		
        
    <div style="height:20px;"></div>


<div class="obsah">
<fb:like href="<?php echo $PAGE_TO_LIKE_URL; ?>" send="false" width="480" show_faces="false"></fb:like>
		<script src="//connect.facebook.net/<?php print(_FBLOCALE); ?>/all.js"></script>

	<div style="margin-top:10px;"><img src="image/becomefan.jpg" /></div>

</div>
        
        
        </body></html>

<?php
exit;
}