<?php
include 'koneksi.php';

$kodewh = $_POST['kodewh'];
$purchase_id = $_POST['purchase_id'];

$sql = "INSERT INTO warehouse (kodewh, purchase_id) 
        VALUES ('$kodewh','$purchase_id')";

$data=mysqli_query($conn, $sql); {
        // "INSERT INTO werehouse (purchase_id) VALUES ($sql)";
       header('location: index.php?hal=warehouse');
     }