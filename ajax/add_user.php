<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	// header("Content-type: application/json");
	header('Content-Type: text/html; charset=utf-8');
	if(empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["username"])){
		die(json_encode(array(
			"title" => "hata",
			"text" => "Lutfen tum alanlari doldurunuz",
			"type" => "error",
			"styling" => "bootstrap3"
		)));
	}
	$check = getModels("users","username='".$_POST["username"]."'");
	if(count($check) > 0){die(json_encode(array(
			"title" => "hata",
			"text" => "Kullanici adi zaten kayitli",
			"type" => "error",
			"styling" => "bootstrap3"
		)));}
	$args = array(
	"username" => $_POST["username"],
	"name" => $_POST["name"],
	"surname" => $_POST["surname"],
	"email" => $_POST["email"],
	"isAdmin" => $_POST["isAdmin"],
	"password" => md5($_POST["password"])
	);
	if(addModel("users",$args)){
		echo json_encode(array(
			"title" => "islem yapildi",
			"text" => "Kullanici basariyla eklendi",
			"type" => "success",
			"styling" => "bootstrap3"
		));
	}else{
		echo json_encode(array(
			"title" => "hata",
			"text" => "bilinmeyen bir sorun olustu",
			"type" => "error",
			"styling" => "bootstrap3"
		));
	}
}
?>