<?php
include_once "db.php";

unset($_SESSION['login']);

to("../WebBackend_System.php?do=login");

?>