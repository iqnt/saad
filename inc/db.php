<?php

$conn = mysqli_connect('localhost','root','','win');
if(!$conn) { 
    echo 'Error:' . mysqli_connect_error();
 }
 error_reporting(0);
 ?>