<?php

session_start();
session_destroy();

header("Location: http://localhost/sep_pro/shared/login.html");
exit();

?>