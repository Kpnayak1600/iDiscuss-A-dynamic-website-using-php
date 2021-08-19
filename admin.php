



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
        min-height:100vh;
      }
    </style>

  <title>Welcome to iDiscuss - Coding Forums</title>
</head>

  <?php
  include 'partials/_dbconnect.php'; 
  ?>




   
    <div class="container my-4">
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"> Welcome  </h4>
  <p>Hey , How are you doing?  welcome to iDiscuss.  You are logged in as Admin </p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to logout <a href="partials/_logout.php"> using this link.</a></p>
</div>
    </div>









  
<?php
error_reporting(0);



if(isset($_POST['title'])){

$th_desc =  $_POST['title'];
$th_descc =  $_POST['comment'];

$th_desc =str_replace("<","&lt;",$th_desc);
$th_desc =str_replace(">","&gt;",$th_desc);
$th_descc=str_replace("<","&lt;",$th_descc);
$th_descc =str_replace(">","&gt;",$th_descc);

$sql = "INSERT INTO `categories` ( `category_name`, `category_description`, `created`)
          VALUES ( '$th_desc', '$th_descc', current_timestamp());"; 
$result = mysqli_query($conn, $sql);

header('Location:index.php');

}
?>

<div class="container mb-3">
<form action="admin.php" method="POST">
<h1 class="py-2">Post a Category</h1>

<div class="form-group">
<label for="exampleInputEmail1">Category title</label>
       <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Title">
    <label for="exampleFormControlTextarea1">Category Discription</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Discription"></textarea>
 
</div>

<button type="submit" class="btn btn-success">Post </button>
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