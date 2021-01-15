<?php 

$con = mysqli_connect('localhost','root','','wallet');

if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}