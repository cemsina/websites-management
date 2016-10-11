<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	header('Content-Type: text/html; charset=utf-8');
	$result = array();
	$user_id = $_GET["id"];
	$user = new model("users");
	$user->select_id($user_id);
	if($user->obj == null){
		echo json_encode(array(
			"title" => "Hata",
			"text" => "Kullanici bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		));
	}else{
		$website_check = new model("websites");
		$website_check->select_id($_POST["website_id"]+0);
		if($website_check->obj == null){
			die(json_encode(array(
					"title" => "Hata",
					"text" => "Websitesi bulunamadi",
					"type" => "error",
					"styling" => "bootstrap3"
				)));
		}
		$check = getModels("user_website_percentage","user_id='$user_id' and website_id='".$_POST["website_id"]."'");
		if(count($check) > 0){die(json_encode(array(
			"title" => "Hata",
			"text" => "Websitesi bu kullanici icin zaten kayitli",
			"type" => "error",
			"styling" => "bootstrap3"
		)));}
		if($_POST["percent"] <= 0){
			die(json_encode(array(
				"title" => "Hata",
				"text" => "Lutfen gecerli bir yuzde degeri giriniz",
				"type" => "error",
				"styling" => "bootstrap3"
			)));
		}
		$result = addModel("user_website_percentage",array(
			'user_id' => $user->id,
			'website_id' => $_POST["website_id"],
			'percent' => $_POST["percent"]
		));
		if($result == true){
			echo json_encode(array(
				"title" => "islem yapildi",
				"text" => "basariyla eklendi",
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
	}
}
?>