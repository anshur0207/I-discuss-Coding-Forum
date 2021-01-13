<?php 

$showError= false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'db_connect.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql = "SELECT * from `users` where username ='$username'";
	$result = mysqli_query($conn, $sql);
	 $numRows= mysqli_num_rows($result);
  	if($numRows ==1){

  		$row = mysqli_fetch_assoc($result);
  			if(password_verify($password, $row['password'])){
  				session_start();
  				$_SESSION['loggedin'] = true;
  				$_SESSION['username'] = $username;
          $_SESSION['sno']=$row['sno'];
  				
  				echo "LOgged in " .$username;
          }
            header("Location: /forum/index.php");

  	
  			// else{
     //      echo "unable to login";
     //    }
     //        //header("Location:/forum/index.php");

  		}
  }
  ?>