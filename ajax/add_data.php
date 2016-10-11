<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	header('Content-Type: text/html; charset=utf-8');
	$website = new model("websites");
	$website->select_id($_GET["id"]);
	if(!isset($_POST["data_date"]) or empty($_POST["data_date"])){
		die(json_encode(array(
			"title" => "hata",
			"text" => "girilen tarih biçimi geçersiz",
			"type" => "error",
			"styling" => "bootstrap3"
		)));
	}
	if($website->obj == null){
		die(json_encode(array(
			"title" => "hata",
			"text" => "websitesi bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		)));
	}
	$result = addModel("website_data",array(
		'website_id' => $_GET["id"],
		'the_data' => $_POST["the_data"],
		'data_date' => $_POST["data_date"]
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
?>