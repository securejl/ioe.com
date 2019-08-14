<?php
session_start();
require_once('functions.php');
require_once('header.php');
connectDB();

/*if (!is_loggedin()) {
    $_SESSION['flash'] = "Invalid Request.";
    header("location: index.php");
    exit();
}
*/
$sql_query = "SELECT * FROM users";

$result = mysql_query($sql_query);
//echo $sql_query."<br/>;
if (!$result) {
    echo "MYSQL_ERROR: ".mysql_error();
    exit();    
}
/*if(mysql_num_rows($result) !=1) {
    echo "User not found</br/>rows".mysql_num_rows($result);
    exit();
}*/
$member = mysql_fetch_assoc($result);
?>
<h2>Members</h2>

<p>There are <?php echo mysql_num_rows($result) ?> members</p>


<table>
<tr><th> ID </th><th> Name </th><th> Email </th></tr>
<?php
while ($member = mysql_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $member['id'] ?></td>
    <td><?php echo $member['name'] ?></td>
    <td>
    <a href="member.php?id=<?php echo $member['id']?>">
    <?php echo $member['email'] ?>
    </a>
    </td>
</tr>
<?php
}
?>
</table>

<?php
require('footer.php');
?>