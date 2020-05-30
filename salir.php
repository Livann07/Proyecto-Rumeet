<?php
session_start();
session_unset();
session_destroy();
header("Location:http://localhost:80/Rumeet/index.php");
?>