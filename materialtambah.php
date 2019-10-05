
<?php
  include "koneksi.php";



  

  // $id = $_POST['id'];
  
  $idmaterial = $_POST['idmaterial'];
  $kodebarangs = $_POST['kodebarang'];

  $sql = "INSERT INTO material (material_id, kodebarang, last_stock)
VALUES ('$idmaterial', '$kodebarangs', '0')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header('location: index.php?hal=material');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 
 ?>


