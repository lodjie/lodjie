


<? 
include 'koneksi.php';

$sql = "SELECT * FROM purchasing";
$result = mysqli_query($conn, $sql);

echo "" . $result["qty"]. "";

?>