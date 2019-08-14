<?php
require_once('functions.php');
require_once('header.php');
connectDB();



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
    $password = $_POST['password'];
    if ($password) {
        $hashed_password = sha1($password);        
    }
    $sql_query ="UPDATE users SET ";
    $sql_query .= "name='".$_POST['name']."',";
    $sql_query .= "email='".$_POST['email']."'";
    if ($hashed_password) {
        $sql_query .=", hased_passsword='$hashed_password'";
    }
    
    $sql_query .= " WHERE email='".$_GET['email']."'";
    //echo $sql_query."<br/>";
    $result = mysql_query($sql_query);
    if (!$result) {
        //echo "MYSQL_ERROR: ".mysql_error();
        $valid_post = false;
        $email_error = true;
        $error_string .= "Email already registered<br/>";
    }
   }
   
   
   if (!$valid_post) {
    $name = $_POST["name"];
    $email = $_POST["email"];
   }
} else {
    $valid_post = false;
    $member = getUser($_GET['email']);
    $name = $member['name'];
    $email = $member['email'];
}


?>
<h2>Member</h2>

<?php

if ($valid_post) { ?>
<h3>Information updated</h3>
<?php
} else {
?>
<!DOCTYPE html>
    <h1>Update Information</h1>
    </php
    if ($error_string) { ?>
        <?php echo $error_string?>
    
        <form action="update.php?email=<?php echo $_GET['email'] ?>" method="post">
            Name: <input type="text" name="name" value="<?php echo $_POST["name"] ?>"><br/>
            Email: <input type="text" name="email" value="<?php echo $_POST["email"] ?>"><br/>
            Password: <input type="password" name="password"><br/>
            Confirm Password: <input type="password" name="confirm_password"><br/>
            <input type="submit" value="Update">
        </form>        
<?php
}
require('footer.php');
?>