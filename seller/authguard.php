<?php

session_start();

if(!isset($_SESSION['login_status'])){

    echo"<h1>Skipped login altogether ; please login first</h1>";
    echo"<a href='../shared/login.html'>Login here..</a>";
    die;
}
if($_SESSION['login_status']==false){
    echo"<h1>Login with proper credentials</h1>";
    echo"<a href='../shared/login.html'>Login here..</a>";
    die;
}
if($_SESSION['usertype']!='Seller'){
    echo "Unauthorized attempt!, Forbidden access";
    die;
}
echo "<div style='display:flex ; justify-content:space-around; background-color:bisque; padding:10px; margin:0'>
      <div>$_SESSION[username]</div>
      <div>$_SESSION[usertype]</div>  
      <div>
      <a href='../shared/logout.php/'>Logout</a>
      </div>
</div>";

?>
