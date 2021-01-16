<?php 

include "model.php";
session_start();
$get = $_POST['action'];

if ($get == 'add_search') {
	if (!isset($_POST['us'])) {
		$_SESSION['error'] = "not selected users";
		header("location: index.php");
		die;
	}
	$us = $_POST['us'];
	$id = "";
	foreach ($us as $i) {
		$id.= "_$i";
	}
	$id.='_';
	$query = "INSERT INTO save_users (user_search) VALUES ('$id') ";
	mysqli_query($con, $query);
	$_SESSION['success'] = "users successful saved";
	header("location: index.php");
}

else if($get = 'add_filter'){
	
	$min_age = $_POST['min_age'];
	$max_age = $_POST['max_age'];
	$male = @$_POST['gender'];
	$min_wallet = $_POST['min_wallet'];
	$max_wallet = $_POST['max_wallet'];
	if (empty($min_age) && empty($max_age) && empty($male)  && empty($min_age) && empty($max_wallet)) {
		$_SESSION['error'] = "not selected filter users";
		header("location: index.php");
		die;
	}
	$filtr = "";
	if (!empty($min_age) || !empty($max_age)) {
		if (!empty($min_age) && !empty($max_age)) {
			$filtr.= ",_age_".$min_age."_".$max_age."_";
		}else{
			$_SESSION['error'] = "select min and max age";
			header("location: index.php");
			die;
		}
	}
	if (!empty($male)) {
		$filtr .= ",_gender_".$male."_";
	}

	if (!empty($min_wallet) || !empty($max_wallet)) {
		if (!empty($min_wallet) && !empty($max_wallet)) {
			$filtr.= ",_wallet_".$min_wallet."_".$max_wallet."_";
		}else{
			$_SESSION['error'] = "select min and max wallet amout";
			header("location: index.php");
			die;
		}
	}
	$filtr_str = trim($filtr,',');

	$query = "INSERT INTO save_users (user_filter) VALUES ('$filtr_str') ";
	mysqli_query($con, $query);
	$_SESSION['success'] = "users successful saved";
	header("location: index.php");

}