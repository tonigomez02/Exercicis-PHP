<?php

session_start();
session_destroy();
setcookie("usuario", $_COOKIE["usuario"], time()-3600);
header("location:login.php");