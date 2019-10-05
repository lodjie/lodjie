<?php
include"koneksi.php";
 
 


$id = $_GET['id'];
    $query = "DELETE FROM purchasing WHERE id = '$id'";
 


 if (mysqli_query($conn, $query)) {
    //   echo "updated successfully";
        // alert('update berhasil');
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit;
     
   } else {
      echo "Error  record: " . mysqli_error($conn);
   }
?>