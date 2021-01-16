<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
		.close{
			background: #f1f1f1; 
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<div class="container" style="background-color: #f1f1f1">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="show_saved_users.php">Show Users</a>
			</div>
		</nav>
		<div class="w-100 p-3">
			<h3 class="text-center text-capitalize">select search mode</h3>
			<ul class="list-group ">
				<li class="list-group-item text-center border-0 bg-secondary">
					<button class="btn btn-primary text-capitalize" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   						 search mode
  					</button>
  					<div class="collapse" id="collapseExample">
  						<div class="w-50 m-auto  mt-5 mb-5 ">
  							<h3 class="text-capitalize text-white">search users</h3>
  							<form action="save_users.php" method="post" >
	  							<div class="form-group">
	  								
	  								<input type="tetx" placeholder="Enter Name" id="search"  class="form-control mt-4 mb-4" >
	  								<div class="d-flex w-100 mb-3 bg-white flex-wrap"  id="list"></div>
	  							</div>
	  							<div class="d-flex w-100 mb-3 bg-white flex-wrap"  id="save"></div>
	  							<button name="action" value="add_search" class="btn btn-primary text-capitalize">SAVE</button>
	  						</form>
  						</div>
  						
					</div>
				</li>
				<li class="list-group-item text-center border-0 bg-secondary">
					<button class="btn btn-primary text-capitalize" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
   						 filter mode
  					</button>
  					<div class="collapse" id="collapseExample1">
  						<div class="w-50 m-auto  mt-5 mb-5 ">
  							<h3 class="text-capitalize mb-4 text-white">search users</h3>
  							<form action="save_users.php" method="post" >
	  							<div class="d-flex w-100 mb-4">
    								<div class="form-group w-50">
      									<label class="text-white text-capitalize">min age</label>
      									<input type="number" name="min_age" class="form-control">
								    </div>
								    <div class="form-group w-50">
								      	<label class="text-white text-capitalize">max age</label>
								      	<input type="number" name="max_age" class="form-control"  >
								    </div>
								</div>
								<div class="d-flex w-100 mb-4">
    								<div class="form-group">
										<div class="form-check " style="margin-right: 40px">
										    <input class="form-check-input" name="gender" type="radio" value="male">
										    <label class="form-check-label text-white text-capitalize" >male</label>
										</div>
								    </div>
								    <div class="form-group">
										<div class="form-check">
										    <input class="form-check-input" name="gender" type="radio" value="female">
										    <label class="form-check-label text-white text-capitalize" >female</label>
										</div>
								    </div>
								</div>
								<div class="d-flex w-100 mb-4">
    								<div class="form-group w-100">
      									<label class="text-white text-capitalize">min wallet</label>
      									<input type="number" class="form-control" name="min_wallet">
								    </div>
								    <div class="form-group w-100">
								      	<label class="text-white text-capitalize">max wallet</label>
								      	<input type="number" class="form-control" name="max_wallet" >
								    </div>
								</div>

	  							<button name="action" value="add_filter" class="btn btn-primary text-capitalize">save</button>
	  						</form>
  						</div>
					</div>
				</li>
			</ul>
			<?php 
				session_start();
				if (isset($_SESSION['error'])) {
					echo "<div class='text-white text-center text-capitalize p-3 alert-dark'>";
						echo $_SESSION['error'];
					echo "</div>";
					unset($_SESSION['error']);
				}
				else if (isset($_SESSION['success'])) {
					echo "<div class='text-white text-center text-capitalize p-3 alert-success'>";
						echo $_SESSION['success'];
					echo "</div>";
					unset($_SESSION['success']);
				}
				echo "ggg111";
			?>
				
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<script type="text/javascript" src="script.js"></script>
</body>
</html>
