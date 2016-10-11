<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
header('Content-Type: text/html; charset=utf-8');
$_id = ($_GET["id"]+0);
$table = $_GET["table"];

if(empty($_id) or empty($table)){die(
	json_encode(array(
		"title" => "hata",
		"text" => "id değeri boş",
		"type" => "error",
		"styling" => "bootstrap3"
	))
);}
$sql = "DELETE FROM ".$_GET["table"]." WHERE id='".($_GET["id"]+0)."'";
if(mysql_query($sql)){
	echo json_encode(array(
		"title" => "islem tamamlandi",
		"text" => "Silme islemi basariyla yapildi",
		"type" => "success",
		"styling" => "bootstrap3"
	));
}else{
	echo json_encode(array(
		"title" => "hata",
		"text" => "bilinmeyen bir hata olustu",
		"type" => "error",
		"styling" => "bootstrap3"
	));
}
?>