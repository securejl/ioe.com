<?php
session_start();
require_once('functions.php');
require_once('header.php');
connectDB();

$sql_query = "SELECT * FROM users WHERE id='".$_GET['id']."'";
//echo $sql_query."<br/>";
$result = mysql_query($sql_query);
if (!$result) {
    echo "MYSQL_ERROR: ".mysql_error();
    exit();
}
if (mysql_num_rows($result) !=1) {
    echo "User ID not found<br/>rows ".mysql_num_rows($result);
    exit();
}

$member = mysql_fetch_assoc($result); 

?>
<h2>Member</h2>

I will display the member with this: <?php echo $_GET['id']?> id.

<div id="member">
    ID:<?php echo $member['id']?><br/>
    Name:<?php echo $member['name']?><br/>
    Email:<?php echo $member['email']?><br/>
</div> 
</br/><a href="update.php?id=<?php echo $_GET['id']?>">Update</a><br/>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <input type="Submit" value="Delete">
<!--</form></br/><a href="update.php?email=<?php echo $_GET['id']?>">Update</a>-->
<?php
require('footer.php');
?>