<?php
     require_once __DIR__ . '/../dbconnect.php';
     if(isset($_SESSION['username'])){
        $_SESSION['username']='';

        header('location:dangnhap.php');
     }
?>