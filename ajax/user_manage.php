<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	// header("Content-type: application/json");
	header('Content-Type: text/html; charset=utf-8');
	$result = array();
	$user_id = $_GET["id"];
	$user = new model("users");
	$user->select_id($user_id);
	if($user->obj == null){
		echo json_encode(array(
			"title" => "hata",
			"text" => "Kullanici bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		));
	}else{
		$user->set("username",$_POST["username"]);
		$user->set("name",$_POST["name"]);
		$user->set("surname",$_POST["surname"]);
		$user->set("email",$_POST["email"]);
		$user->set("isAdmin",$_POST["isAdmin"]);
		$user->set("password",md5($_POST["password"]));
		$result["title"] = "Ýþlem Yapýldý";
		$result["text"] = "Kullanýcý baþarýyla düzenlendi";
		$result["type"] = "success";
		$result["styling"] = "bootstrap3";
		echo json_encode(array(
			"title" => "islem yapildi",
			"text" => "Kullanici basariyla duzenlendi",
			"type" => "success",
			"styling" => "bootstrap3"
		));
		
	}
}
?>