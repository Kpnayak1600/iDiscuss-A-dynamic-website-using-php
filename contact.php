<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
<?php

ob_start();
  include 'partials/_dbconnect.php'; 
?>
<?php
  
  include 'partials/_header.php'; 
?>
<?php

   $showAlert = false;
   
   if(isset($_POST['email'])){
      $email = $_POST['email'];
      $comment = $_POST['comment'];

      
$email =str_replace("<","&lt;",$email);
$email =str_replace(">","&gt;",$email);
$comment=str_replace("<","&lt;",$comment);
$comment =str_replace(">","&gt;",$comment);

     $sql = "INSERT INTO `contacts` (`email`, `comment`, `dt`) 
                VALUES ( '$email', '$comment', current_timestamp());";
     $result = mysqli_query($conn,$sql);   
     $showAlert = true;

     header('location:index.php');
    
     if($showAlert){
         echo'<div class="alert alert-success" role="alert">
               success! Your comment has been added! 
                </div>
            ';
     }
   
    
 } 
  
?>
 

 







<h2 class ="text-center" > Contact us</h2>
</div>

<div class="container my-4 id=ques">

<form action ="contact.php" method = "post">
 
   <div class="w-50  m-auto ">
   <lable > Enter your email-id</lable>
   <input type = "email" name ="email" autocomplete = "off" class="form-control">
   </div> 
 
   <div class="w-50  m-auto">
   <lable > Elaborate your concern</lable>
  <textarea class="form-control" name ="comment">
  </textarea>
   </div>
   <button type="submit" class="btn btn-primary"  >Submit</button>
  </form>
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