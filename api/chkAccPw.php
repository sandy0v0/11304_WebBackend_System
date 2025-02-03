<?php include_once "db.php";
    $count = $Admin->count($_POST);
    if($count != 0)
    {
        $_SESSION['login'] = 1;
    }
    echo $count;
?>