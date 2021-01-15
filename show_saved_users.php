<?php include 'model.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="background-color: #f1f1f1">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="index.php">Home</a>
			</div>
		</nav>
		<div class="row">
			<div class="col-lg-6">
				<h4 class="mt-3 mb-3 text-center">Show Search Saved Users</h4>
				<div class="w-100">
					<ol class="d-flex flex-wrap w-100">
						<?php
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
						?>
					</ol>
				</div>
			</div>
			<div class="col-lg-6">
				<h4 class="mt-3 mb-3 text-center">Show Filter Saved Users</h4>
				<div class="w-100">
					<ol class="d-flex flex-wrap w-100">
						<?php 
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
													if (!empty($user_filter_row[2])) {
														
														$female = $user_filter_row[2];
														$query_arr[] = "gender IN ('$male','$female')";
													}else{
														$query_arr[] = " gender = '$male' ";
													}
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
						?>	
					</ol>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>			