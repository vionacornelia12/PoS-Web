<?php
    include("conn.php");
    $id_staff	= ($_POST['id_staff']);
    $id_menu	= ($_POST['id_menu']);
    $jumlah	= ($_POST['jumlah']);
    $status = "paid";
    $query	= $conn->query("INSERT INTO invoice (id_staff, id_menu, jumlah, status) value ('$id_staff', '$id_menu', '$jumlah', '$status')");

    return "berhasil";
?>