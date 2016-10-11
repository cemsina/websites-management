<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
header('Content-Type: text/html; charset=utf-8');
$sql = "DELETE FROM websites WHERE id='".($_GET["id"]+0)."'";
mysql_query($sql);
$sql2 = "DELETE FROM user_website_percentage WHERE website_id='".($_GET["id"]+0)."'";
mysql_query($sql2);
echo json_encode(array(
	"title" => "islem tamamlandi",
	"text" => "Silme islemi basariyla yapildi",
	"type" => "success",
	"styling" => "bootstrap3"
));
?>