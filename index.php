<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Gorditas&display=swap" rel="stylesheet">
    <style>
      #ques{
        min-height: 762px;
      }
    </style>
    <title>i-Discuss -Coding Forums</title>
  </head>
  <body>
    <?php include ('partials/db_connect.php');  ?> 
    <?php include ('partials/header.php');  ?> 
    



    <!-- Slider start here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/banner-1.png" alt="First slide" style="height:400px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner-2.png" alt="Second slide" style="height:400px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner-3.png" alt="Third slide" style="height:400px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Category Container start -->
  <div class="container my-4" >
    <h2 class="text-center my-4 " style="font-family: 'Gorditas', cursive;"> I-Discuss - Browse Categories</h2>
    <div class="row my-4">
      <!-- Fetch all the category -->
      <!--use a loop to itertate thorugh categories  -->
      <?php

      $sql  ="SELECT * FROM `categories`";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        // echo $row['category_id'];
        // echo $row['category_name'];
        $cat=$row['category_name'];
        $desc=$row['category_description'];
        $id =$row['category_id'];

        echo ' <div class="col-md-6 col-sm-6 col-lg-4 col-xl-4 col-12 my-2">
                  <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="https://source.unsplash.com/500x400/?'.$cat.',coding" alt="Card image cap">
                  <div style="height:130px;">
                  <div class="card-body  ">
                    <h5 class="card-title text-center"><a href="threadslist.php?catid=' . $id .'">'.$cat.'</a></h5>
                    
                    <div class="row justify-content-center">
                        <a href="threadslist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                            </div>
                   
                  </div>
                  </div>
                  </div>
                </div> ';

      }
      ?>

    </div>
  </div>
    




    <?php include ('partials/footer.php')  ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>