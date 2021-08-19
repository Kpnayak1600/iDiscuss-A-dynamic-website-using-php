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
      #maincontainer{
        min-height:100vh;
      }
    </style>

  <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
  <?php
  include 'partials/_header.php'; 
  ?>
  <?php
  include 'partials/_dbconnect.php'; 
  ?>

  



<!-- search result start here -->

<div class="container my-3" id="maincontainer">

<h1>Search result for <em>"<?php  echo $_GET['search']  ?>"</em></h1>


<?php
$noResults = true;
$query = $_GET["search"];
  $sql = "SELECT * FROM threads WHERE MATCH(thread_title,thread_desc) against('$query')" ;
  $result = mysqli_query($conn,$sql);
     while($row = mysqli_fetch_assoc($result)){
      $noResult = false;
       $title = $row['thread_title'];
       $desc = $row['thread_desc'];
       $thread_id  = $row['thread_id'];
       $url = "thread.php?threadid=".$thread_id;
       $noResults=false;
  
       //Display the search result
       echo '<div class="result">
       <h3> <a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
       <p>'.$desc.'</p></div>';
  
     }
      
   
     if($noResults){
       echo '<div class="jumbotron jumbotron-fluid">
       <div class="container">
         <p class="display-4">No Results found</p>
         <p class="lead">Suggetions:<ul>
                     <Li>Make sure that all words are spelled correctly.</Li>
                     <Li>Try different keywords.</Li>
                     <Li>Try more general keywords.</Li>
                     </ul>
                     </p>
       </div>
     </div>';
     }
  


  ?>

</div>



<?php
  include 'partials/_footer.php'; 
  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2D4KtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>