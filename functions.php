<?php
session_start();
function activeUser(){
	$user = new model("users");
	if(isset($_COOKIE["userID"])){
		$_id = $_COOKIE["userID"];
		$user->select_id($_id);
	}	
	return $user;
}
$activeUser = activeUser();
if($activeUser->obj == null){header('Location: login.php');die();}
if(!isset($_SESSION["user"]) or empty($_SESSION["user"])){
	$_SESSION["user"] = activeUser();
}
function adminOnlyPage(){
	$activeUser = activeUser();
	if($activeUser->obj["isAdmin"] != true){header('Location: index.php');die();}
}
?>