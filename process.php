<?php

session_start();

$mysqli = new mysqli('localhost','root','','cbscrud') or die(mysqli_error($mysqli));

if(isset($_POST['insertdata'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];

	$mysqli->query("INSERT INTO customer (`fname`,`lname`,`email`,`username`,`password`,`contact`) VALUES('$fname','$lname','$email','$username',md5('$password'),'$contact')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: index.php");
}

if(isset($_POST['deletedata'])){
	$id = $_POST['delete_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$mysqli->query("DELETE FROM customer WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if(isset($_POST['updatedata'])){
	$id = $_POST['update_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];

	$mysqli->query("UPDATE customer SET fname='$fname', lname='$lname', email='$email', username='$username', password=md5('$password'), contact='$contact' WHERE id='$id'") or die($mysqli->error) ;

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php");
}

?>