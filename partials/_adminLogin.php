

<?PHP
 $login = false;
 $showError = "You are not logged in";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     include '_dbconnect.php';
     $email = $_POST['loginEmail'];
     $pass =  $_POST['loginPass'];
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    // $sql = "SELECT * FROM `log` where  `username` = '$username' AND `password` = '$password'    ";
    $sql = "SELECT * FROM `adminlogin` WHERE username = '$email' AND user_pass =  '$pass' ";
   
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
   
   
  
    if($numRows ==  1)
    {
       //  $row = mysqli_fetch_assoc($result);
     
       //  if(password_verify($pass,$row['user_pass'])){
           $login = true;
            session_start();
            $_SESSION['logged'] = true; 
      
           
                header("location: /forum/admin.php");

        
            
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    
    <?php
    // if($login){
    // echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> You are logged in
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div> ';
    // }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> '. $showError.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Admin, <em>Login to Post a Category</em></h1>
     <form action="_adminLogin.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="loginEmail" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="loginPass">
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>