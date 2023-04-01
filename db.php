<?php
$host = "localhost";
$username = "root";
$password="";
$db="rmbmovies";

$con = mysqli_connect($host,$username,$password,$db);
if(!$con) {
    die("connection failed");
}