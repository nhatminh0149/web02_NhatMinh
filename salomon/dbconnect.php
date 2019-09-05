<?php
 $conn=mysqli_connect('127.0.0.1', 'root','','salomon');

 $conn->query("SET NAMES 'utf8'");
 $conn->query("SET CHARACTERS SET utf8");

 session_start();
?>