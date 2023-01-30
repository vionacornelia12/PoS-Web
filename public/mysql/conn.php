<?php

$conn = new mysqli("localhost","root","","pos-web");

if(!$conn){
    die("gagal :".mysqli_connect_error());
}