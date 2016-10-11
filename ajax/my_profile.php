<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
if($_POST){
	// header("Content-type: application/json");
	header('Content-Type: text/html; charset=utf-8');
	$result = array();
	if($activeUser->obj == null){
		echo json_encode(array(
			"title" => "hata",
			"text" => "Kullanici bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		));
	}else{
		$activeUser->set("name",$_POST["name"]);
		$activeUser->set("surname",$_POST["surname"]);
		$activeUser->set("email",$_POST["email"]);
		if(isset($_POST["password"]) and !empty($_POST["password"])){
			$activeUser->set("password",md5($_POST["password"]));
		}
		echo json_encode(array(
			"title" => "islem yapildi",
			"text" => "Kullanici basariyla duzenlendi",
			"type" => "success",
			"styling" => "bootstrap3"
		));
	}
}
?>