
<?php 

$showError= false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'db_connect.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

	// check whtere this email exits
	$existsSql ="SELECT * FROM `users` WHERE username = '$username'";
	$result = mysqli_query($conn,$existsSql);
  $numExistRows= mysqli_num_rows($result);
  if($numExistRows > 0){
   // $exists = true;
   $showError="Username is already Exists"; 
  }
  else{
    //$exists = false;\
  if(($password == $cpassword)){
    $hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `users` ( `username`, `password`, `timestamp`) VALUES ('$username', '$hash', current_timestamp())";
		$result = mysqli_query($conn, $sql);
		if($result){
			$showAlert = true;
			
			 header("Location:/forum/index.php?signupsuccess=true");
			 exit();

		}
	}
		else{
			$showError = "Password do not match";
			

		}
	}


	header("Location:/forum/index.php?signupsuccess=false&error = $showError");

}
?>



