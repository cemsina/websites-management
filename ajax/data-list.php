<?php 
include("../config.php");
include("../manage/model.php");
include("../functions.php");
if($_POST){
	header('Content-Type: text/html; charset=utf-8');
	$start = $_POST["date_start"];
	$end = $_POST["date_end"];
	$website_id = $_GET["id"];
	$website = new model("websites");
	$website->select_id($website_id);
	$result = array();
	$user_websiteList = getModels("user_website_percentage","user_id='".$activeUser->id."' and website_id='".$website_id."'");
	if(count($user_websiteList) != 1 and $activeUser->obj["isAdmin"] != true){
		$result[] = array(
			"title" => "hata",
			"text" => "Website kullaniciya ekli degil",
			"type" => "error",
			"styling" => "bootstrap3"
		);
		die(json_encode($result));
	}
	if($activeUser->obj["isAdmin"] == true and count($user_websiteList) == 0){
		$user_website = new model("user_website_percentage");
		$user_website->obj["percent"] = 0;
	}else{
		$user_website = $user_websiteList[0];
	}
	if($website->obj == null){
		$result[] = array(
			"title" => "hata",
			"text" => "Website bulunamadi",
			"type" => "error",
			"styling" => "bootstrap3"
		);
	}else{
		$dataList = getModels("website_data","website_id='$website_id' and data_date >= date('$start') and data_date <= date('$end')");
		// $dataList = getModels("website_data");
		if(count($dataList) > 0){
			$result[] = array(
				"title" => "sonuclar listelendi",
				"text" => "",
				"type" => "success",
				"styling" => "bootstrap3"
			);
			foreach($dataList as $data){
				
				$result[] = array(
					"id" => $data->id,
					"the_data" => $data->obj["the_data"],
					"data_date" => $data->obj["data_date"],
					"user_part" => $user_website->obj["percent"]
				);
			}
		}else{
			$result[] = array(
				"title" => "uyari",
				"text" => "bu aralikta bir veri bulunamadi",
				"type" => "warning",
				"styling" => "bootstrap3"
			);
		}
	}
	echo json_encode($result);
}
?>