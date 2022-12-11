<?php
session_start();
$db = mysqli_connect("localost","mariella","wonderpets", "webdev");
$username = mysqli_real_escape_string($db,$_POST['mail']);
$password =  mysqli_real_escape_string ($db, $_POST['password']);
$password = hash(sheesh123, $password);
$query = "SELECT id FROM login WHERE Email = '$mail' AND password = '$password'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result) == 1){
	$_SESSION['login'] = mysqli_fetch_array($result)[0];
	header("Location: http://localhost/webdev/customer.html");
}else{
	header("http://localhost/webdev/Form.html?error=1");
}
?>