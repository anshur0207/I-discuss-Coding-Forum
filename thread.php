<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      ques{
        min-height: 762px;
      }
    </style>

    <title>i-Discuss -Coding Forums</title>
  </head>


  <body>
    <?php include ('partials/db_connect.php');  ?> 
    <?php include ('partials/header.php');  ?> 
    



    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        $title =$row['thread_title'];
        $desc =$row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        //Query the users table to find out the name of op
         $sql2="SELECT username FROM `users` where sno=$thread_user_id";
         $result2 =mysqli_query($conn,$sql2);
         $row2 = mysqli_fetch_assoc($result2);
          $posted_by = $row2['username'];
        

}
    ?>



    <?php 
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      // insert into comment db

    $comment = $_POST['comment'];
    $comment =str_replace("<", "&lt;", $comment);
    $comment =str_replace(">", "&gt;", $comment);
    $sno =$_POST['sno'];
    
    $sql="INSERT INTO `comments` ( `thread_id`, `comment_by`, `comment_content`, `comment_time`) VALUES ('$id', '$sno', '$comment', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    $showAlert = true;
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>Your Comment has been added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

    }
}

    ?>

  

<!-- Category Container start -->
  <div class="container my-4">
  <div class="jumbotron">
  <h1 class="display-4"><?php echo $title; ?>   </h1>
  <p class="lead"><?php echo $desc; ?></p>
  <hr class="my-4">
  <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images.</p>
  <p> Posted By <em><?php echo $posted_by ?></em></p>
  
</div>
</div>

  <?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo'<div class="container">
  <h1 class="py-2">Post a Comment</h1>
  <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Type Your Comment</label>
    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
  </div>
  
  
  <button type="submit" class="btn btn-success">Post A comment</button>
</form>';
}
      else{
        echo '<div class="container">
        <h3>Post a comment</h3>
  <p class="lead"> You are Not Logged In. Please Login To post Comment</p>
</div>';

      }
?>


<div class="container mb-5"style="min-height: 631px;">
  <h1 class="py-2">Discussions</h1>

   
  <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);
    $noResult= true;
      while($row = mysqli_fetch_assoc($result)){
         $noResult= false;
         $id=$row['comment_id'];
        $content =$row['comment_content'];
        $comment_time= $row['comment_time'];
        $thread_user_id=$row['comment_by'];
         $sql2="SELECT username FROM `users` where sno=$thread_user_id";
         $result2 =mysqli_query($conn,$sql2);
         $row2 = mysqli_fetch_assoc($result2);
        
  echo '<div class="media my-3">
  <img src="img/people.png" width="34px" class="mr-3" alt="Generic placeholder image">
  <div class="media-body">

  <p class="font-weight-bold my-0">'.$row2['username'].' at '.$comment_time. ' </p>
    
    '.$content . '
    
  </div>
</div>';
}
  
if($noResult){
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Comments Found</h1>
    <p class="lead">Be The First Person To Comment</p>
  </div>
</div>';
}
    ?> 


</div>






</div>











<style>
  * {
  margin: 0;
  padding: 0;
}
body{
  height: 100%;
  width: 100%;
}
</style>



    <?php include ('partials/footer.php');  ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>