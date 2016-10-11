<?php 
include("../config.php");
include("../manage/model.php");
if($_POST){
	$username = $_POST["username"];
	$username = str_replace('"', "", $username);
	$username = str_replace("'", "", $username);
	$password = md5($_POST["password"]);
	if(empty($username) or empty($password)){
		die("Kullanıcı adınız veya şifreniz boş olamaz");
	}
	$matches = getModels("users","username='$username' and password='$password'");
	if(count($matches) == 1){
		setcookie('userID', $matches[0]->obj["id"], time()+(60*60*24*7), '/'); // 1 week
		echo "true";
	}else{
		echo "Kullanıcı adınız veya şifreniz hatalı";
	}
}
?>