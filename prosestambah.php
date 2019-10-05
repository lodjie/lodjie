
<?php
  include "koneksi.php";



  

  // $id = $_POST['id'];
  
  $kodepurchase = $_POST['kodepurchase'];
  $barang = $_POST['barang'];
  $supplier  = $_POST['supplier'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];

  $sql = "INSERT INTO purchasing (kodepurchase, kodebarang, kodesupplier, qty, price) 
          VALUES ('$kodepurchase','$barang','$supplier', '$qty','$price')";
         

  $data=mysqli_query($conn, $sql); {
     // "INSERT INTO werehouse (purchase_id) VALUES ($sql)";
    header('location: index.php?hal=purchase');
  }



    // if ($conn->query($sql) === TRUE) {
    //   $last_id = $conn->insert_id;
    //   echo "new record created succesfully. last inserted ID is:" . $last_id;
      
    // } $sql2 = "INSERT INTO werehouse (purchase_id) VALUES ($last_id)";
    //   if ($conn->query($sql2) === TRUE)
    //     location('index.php?hal=purchase')


 
 ?>


