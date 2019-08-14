<?php
session_start();
require_once('functions.php');
require('header.php');
connectDB();


printPicTitle("<br/>Registration Page");

$valid_post = true;
$error_string = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if($_POST["password"] != $_POST["confirm_password"]) {
    $valid_post = false;
    $error_string = "Your Passwords didn't match, please check your entries<br/>";
   }
   
   if (strlen($_POST["name"]) < 3
       
       ) {
    $valid_post = false;
    $error_string = "Please use more than three characters for name<br/>";
    $name_error = true;   
   }
   /*add validations for name, email to be less than 200 characters*/
   
   if ($valid_post) {
      $hashed_password = sha1($_POST['password']);
      /*use bcrypt before publication, more secure*/
      $sql_query = "INSERT INTO users (email,name,hashed_password) VALUES (";
      $sql_query .= "'".$_POST['email']."',";
      $sql_query .= "'".$_POST['name']."', ";
      $sql_query .= "'$hashed_password');" ;     
      /*echo $sql_query;*/
      $result = mysql_query($sql_query);
      if (!result) {
         /*echo "<br/>MYSQL Error: ".mysql_error();*/
         $valid_post = false;
         $error_string .="Email already registered<br/>";       
         }  
   }
   
   if ($valid_post) {
    $_SESSION['flash'] = "You are registered.";
    /*header("location: members.php");*/
    exit();
   } else {
    $name = $_POST["name"];
    $email = $_POST["email"];
   }
} else {
    $valid_post = false;
}

/*printHeader("Login");*/
?>
<?php
if ($valid_post) { ?>
<h3>Congratulations, you are ready to start developing your next idea!</h3>
<?php
} else {
?>
<!DOCTYPE html>
    <h1>Please register below to get started with your next business idea!</h1>
    </php
    if ($error_string) { ?>
        <?php echo $error_string?>
    }
        <form action="register.php" method="post">
            Name: <input type="text" name="name" value="<?php echo $_POST["name"] ?>"><br/>
            Email: <input type="text" name="email" value="<?php echo $_POST["email"] ?>"><br/>
            Password: <input type="password" name="password"><br/>
            Confirm Password: <input type="password" name="confirm_password"><br/>
            <input type="submit" value="Register">
        </form>


<?php
}
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
