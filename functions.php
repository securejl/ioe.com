<?php
function connectDB() {
    mysql_connect('localhost','jyfyb100_bblog','NU~4q?~NeM4I');
    mysql_select_db('jyfyb100_businessblog');  
}
?>
<?php
function changePic($Pic) { ?>
    <?php '$Pic' ?>
<?php    
}
?>
<?php
function printPicTitle($PicTitle) { ?>
    <?php print $PicTitle ?>
<?php    
}
?>
<?php/*
function printHeader($subtitle) { ?>
    <?php print $subtitle ?>
<?php
}*/
?>
<?php
function NavLinks($url, $name) { ?>
    <li><a href="<?php print $url ?>"><?php print $name?></a></li>
<?php
}

function getUser($user_email) {
    $sql_query ="SELECT * FROM users WHERE email='".$user_email."'";
    //echo $sql_query."<br/>;
    $result = mysql_query($sql_query);
    if (!$result) {
        echo "MYSQL_ERROR: ".mysql_error();
        exit();    
    }
    if (mysql_num_rows($result) !=1) {
        echo "User not found</br/>rows ".mysql_num_rows($result);
        exit();
    }

}
?>