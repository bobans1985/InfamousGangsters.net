<?  
mysql_connect("localhost", "root", "BacoN123") or die('Database error1');
mysql_select_db("testSG") or die('Database error');


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$getinfo = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getinf = mysql_fetch_array($getinfo);
$rand = $getinf['ver1'];
$ID = $getinf['ID'];
$getida= $_GET['id'];
$getid= preg_replace($saturated,"",$getida);

if($getid != $ID){die('error');}


// create the image
$image = imagecreate(45, 30);

$cone = mt_rand(100,255);$ctwo = mt_rand(100,255);$cthree = mt_rand(100,255);

$ccone = mt_rand(5,100);$cctwo = mt_rand(5,80);$ccthree = mt_rand(5,80);



// use white as the background image
$bgColor = imagecolorallocate ($image, $cone, $ctwo, $cthree);

// the text color is black
$textColor = imagecolorallocate ($image, $ccone, $cctwo, $ccthree);

// write the random number
imagestring ($image, 5, 5, 8, $rand, $textColor);





// send several headers to make sure the image is not cached
// taken directly from the PHP Manual

// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// always modified
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");

// send the content type header so the image is displayed properly
header('Content-type: image/jpeg');

// send the image to the browser
imagejpeg($image);

// destroy the image to free up the memory
imagedestroy($image);

?>
