<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
/* 
table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;} */
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','pt');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM purchasing WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class=' text-center'>
<tr>
<th>kode purchase</th>
<th>kode barang</th>
<th>kode supplier</th>
<th>Quantity</th>
<th>price</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['kodepurchase'] . "</td>";
    echo "<td>" . $row['kodebarang'] . "</td>";
    echo "<td>" . $row['kodesupplier'] . "</td>";
    echo "<td>" . $row['qty'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>