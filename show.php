<?php  

include "model.php";

function search(){
	global $con;
	echo '<ol class="d-flex flex-wrap w-100">';
	$query = "SELECT user_search FROM save_users";
	$res = mysqli_query($con, $query);
	$result = mysqli_fetch_all($res,MYSQLI_ASSOC);
	foreach ($result as  $v) {
		$search_name =  $v['user_search'];
		if(!empty($search_name)){
			preg_match_all("~\d~", $search_name,$match);
			echo "<li style='margin-right: 30px;'>";
				echo "<ul>";
					foreach($match[0] as $id){
						$query_user = "SELECT * FROM users WHERE id = '$id' ";
						$res_user = mysqli_query($con, $query_user);
						$result_user = mysqli_fetch_all($res_user,MYSQLI_ASSOC);
						foreach($result_user as $user){
							$user_name = $user['name'];
							echo "<li>$user_name</li>";
						}
					}
				echo "</ul>";
			echo "</li>";
		}
									
	}
						
	echo '</ol>';
						
}

function filtr(){
	global $con;
	echo '<ol class="d-flex flex-wrap w-100">';
	$query_filter = "SELECT user_filter FROM save_users";
	$res_filter = mysqli_query($con, $query_filter);
	$result_filter = mysqli_fetch_all($res_filter,MYSQLI_ASSOC);
	foreach ($result_filter as  $f) {
		$filter = $f['user_filter'];
		if (!empty($filter)) {
			$query_filter = "SELECT * FROM users WHERE ";
			$query_arr = [];
			$reg = explode(',', $filter);
				echo "<li style='margin-right: 30px;'>";
					echo "<ul>";
						foreach ($reg as $us) {
							$us_trim = trim($us,'_');
							$user_filter_row = explode('_', $us_trim);
							if ($user_filter_row[0] == 'age') {
								$min_age = $user_filter_row[1];
								$max_age = $user_filter_row[2];
								$query_arr[] = "age >= $min_age AND age <= $max_age";
							}
							if ($user_filter_row[0] == 'gender') {
								$male = $user_filter_row[1];
								$query_arr[] = " gender = '$male' ";
							}
							if ($user_filter_row[0] == 'wallet') {
								$min_wallet = $user_filter_row[1];
								$max_wallet = $user_filter_row[2];
								$query_arr[] = "wallet_amount >= $min_wallet AND wallet_amount <= $max_wallet";
							}
						}
						$query_filter .= implode(" AND ", $query_arr)." LIMIT 10";
						$res_user = mysqli_query($con, $query_filter);
						if (mysqli_num_rows($res_user)>0) {
							$result_user = mysqli_fetch_all($res_user,MYSQLI_ASSOC);
								foreach($result_user as $user){
									$user_name = $user['name'];
									echo "<li>$user_name</li>";
								}
							}else{
								echo "<li> empty user </li>";
							}
											
												
					echo "</ul>";
				echo "</li>";
			}
		}
	echo '</ol>';
}