<?php
include 'koneksi.php';

$kodewh = $_POST['kodewh'];
$purchase_id = $_POST['purchase_id'];
$inqty = $_POST['inqty'];

$sql = "INSERT INTO warehouse (kodewh, purchase_id, inqty) 
        VALUES ('$kodewh','$purchase_id','$inqty')";

//echo $purchase_id;
if(mysqli_query($conn, $sql)) {
        $sql2 = "SELECT kodebarang from warehouse as a INNER JOIN purchasing as b on a.purchase_id = b.id where kodewh = '$kodewh' limit 1";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $kodebarang = $row["kodebarang"];
                //echo $kodebarang;
        }
        //echo $inqty;
        $sql3 = "UPDATE material SET last_stock = (last_stock + '$inqty') WHERE kodebarang = '$kodebarang'";
        if (mysqli_query($conn, $sql3)) {} 
        } else {
        echo "0 results";
        }
}


header('location: index.php?hal=warehouse');
/* if ($data=mysqli_query($conn, $sql)) {
        $sql2 = "UPDATE material SET last_stock = (last_stock + '$inqty') WHERE id = 1";

        // "INSERT INTO werehouse (purchase_id) VALUES ($sql)";
       header('location: index.php?hal=warehouse');
     } */