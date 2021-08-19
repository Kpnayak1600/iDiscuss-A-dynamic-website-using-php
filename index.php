<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      #ques{
        min-height:433px;
      }
  
    </style>

  <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body class= background> 
  <?php
  include 'partials/_header.php'; 
  ?>
  <?php
  include 'partials/_dbconnect.php'; 
  ?>

<!-- slider start here -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://source.unsplash.com/1600x900/?'.laptop.',coding" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 " src="https://source.unsplash.com/1600x900/?'.computer.',coding" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 " src="https://source.unsplash.com/1600x900/?'.books.',coding" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




















<!-- categories container start here -->
  <div class="container my-4 id=ques">
    <h2 class="text-center my-4"> iDiscuss - Browse Categories</h2>
    <div class="row my-4">


    <!-- Fetch all the categories  -->

       <?php
       $sql = "SELECT * FROM `categories`" ;
       $result = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          $cat = $row ['category_name'];
          $id = $row ['category_id'];
          $desc = $row ['category_description'];
        echo'<div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="https://source.unsplash.com/1600x900/?'.$cat.',coding" 
          alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"> <a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
            <p class="card-text">'.substr($desc,0,90).'......</p>
            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
          </div>
        </div>
      </div>';
        
       }
       
        
        ?> 
<!-- use a for loop to iterate through categories -->
      
    






      </div>
      </div>





<?php
  include 'partials/_footer.php'; 
  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>