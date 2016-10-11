<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	// header("Content-type: application/json");
	header('Content-Type: text/html; charset=utf-8');
	$result = array();
	$website_id = $_GET["id"];
	$website = new model("websites");
	$website->select_id($website_id);
	if($website->obj == null){
		echo json_encode(array(
			"title" => "hata",
			"text" => "Website bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		));
	}else{
		$website->set("url",$_POST["url"]);
		$website->set("description",$_POST["description"]);
		echo json_encode(array(
			"title" => "islem yapildi",
			"text" => "Websitesi basariyla duzenlendi",
			"type" => "success",
			"styling" => "bootstrap3"
		));
	}
}
?>