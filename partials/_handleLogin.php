<?PHP
 $login = false;
 $showError = "false";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     include '_dbconnect.php';
     $email = $_POST['loginEmail'];
     $pass =  $_POST['loginPass'];


    $sql = "SELECT `sno`, `user_email`, `user_pass`, `timestamp` FROM `users`
             WHERE user_email = '$email'  AND user_pass =$pass";
    


     $result = mysqli_query($conn, $sql);
     $numRows = mysqli_num_rows($result);
     echo $numRows ."\n";
    
   
     if($numRows ==  1){
        //  $row = mysqli_fetch_assoc($result);
      
        //  if(password_verify($pass,$row['user_pass'])){
            $login = true;
             session_start();
             $_SESSION['loggedin'] = true;
             $_SESSION['user_email'] = $email;
             $_SESSION['sno'] = $row['sno'] + 18;
             echo "logged in".$email;
            
            header("Location: /forum/index.php");

         }
         header("Location: /forum/index.php");
        
      
       
     }
//  }
 ?>



