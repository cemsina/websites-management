<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
adminOnlyPage();
if($_POST){
	header('Content-Type: text/html; charset=utf-8');
	$url = $_POST["url"];
	$check = getModels("websites","url='$url'");
	if(count($check) > 0){
		echo json_encode(array(
				"title" => "uyari",
				"text" => "websitesi zaten kayitli",
				"type" => "warning",
				"styling" => "bootstrap3"
			));
	}else{
		if(isset($_POST["description"])){$desc = $_POST["description"];}else{$desc = "";}
		$result = addModel("websites",array(
			'url' => $url,
			'description' => $desc
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