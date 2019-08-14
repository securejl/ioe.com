<?php
session_start();
require_once('functions.php');
require('header.php');
connectDB();


$valid_post = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hashed_password = sha1($_POST['password']);
  $sql = "SELECT * FROM users WHERE ";
  $sql .="email='" .$_POST['email']."' AND ";
  $sql .="hashed_password='$hahed_password'";
  /*echo $sql."<br/>";*/
  $result = mysql_query($sql);
  if (!$result) {
   echo mysql_error();
   exit();
  }
  if (mysql_num_rows($result) != 1) { 
   $login_error = true;
   $valid_post = false;
  } else {
   $user = mysql_fetch_assoc($result);
   $_SESSION['email'] =$user['email'];
  }
   } else {
      $valid_post = false;
   }

if ($valid_post) {
   echo "Redirect user!";
   exit();
}

?>
   
<!DOCTYPE html>
    <h1>Sign In</h1>
    <p><strong>Please sign in to get started. No account yet? Please click link below to get started.</strong></p>


   <?php if ($login_error) { ?>
   <p>Invalid Email/Password</p>
   <?php } ?>
        <form action="login.php" method="post">
          
            Email: <input type="text" name="email"><br/>
            Password: <input type="password" name="password"><br/>
   
            <input type="submit" value="Sign In">
        </form><br/>
<a href="register.php">Create an account</a>

<?php

        include('footer.php');
?>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>

<!--
      $sql_query = "INSERT INTO users(id, email, name, hashed_password, role) VALUES 
      $sql_query .= "'".$_POST['id']."', ";
      $sql_query .= "'".$_POST['email']."', ";
      $sql_query .= "'".$_POST['name']."', ";
      $sql_query .= "'".$_POST['hashed_password']."', ";
      $sql_query .= "'".$_POST['role']."; ;
      echo sql_query; -->