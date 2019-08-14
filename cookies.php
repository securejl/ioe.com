<?php
require_once('functions.php');
require_once('header.php');


if (isset($_GET['color'])) {
    setcookie("color", $_GET['color']);
    $color = $_GET['color'];
} elseif(isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
} else {
    $color = "red";
}
?>
<h2>Cookies</h2>
<a href="cookies.php?color=red">Red</a><br/>
<a href="cookies.php?color=blue">Blue</a><br/>
<a href="cookies.php?color=green">Green</a><br/>
<a href="cookies.php?color=orange">Orange</a><br/>
<div style="color: <?php echo $color?>;">
This text will change color!
</div>


<?php
require('footer.php');
?>