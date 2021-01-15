<?php 

include "model.php";
$get = $_POST['action'];
if ($get == 'search_user') {
	$search =$_POST['search'];
	if (empty($search)) {
		$arr = [];
		echo json_encode($arr);
		die;
	}
	$query = "SELECT * FROM users WHERE name LIKE '$search%' ";
	$res = mysqli_query($con,$query);
	if (mysqli_num_rows($res) > 0 ) {
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
		$users = '';
		foreach ($result as  $v) {
			$users.="<div class=' border m-3'>";
				$users.="<button type='button' style='background: #f1f1f1;margin-right: 10px;' value='".$v['id']."' class = 'btn text-capitalize s' >select user </button>";
				$users.="<label class = 'form-check-label text-capitalize' style='margin-right: 10px;' >".$v['name']." </label>";
			$users.="</div>";
		}
	}else{
		$users = "<h2 class='text-capitalize'>users not found</h2>";
	}
	echo json_encode($users);
}

