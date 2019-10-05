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

$con = mysqli_connect('localhost','akbarlaz','password','pt');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM purchasing WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<label for='qty'>Order Quantity:</label>
        <input type='text' name='orderqty' id='orderqty' value='". $row['qty']."' disabled>";
    echo "<br>";
    echo "<label for='inqty'>In Quantity:</label>
        <input value='". $row['qty'] ."' type='text' name='inqty' id='inqty'>";
    /* echo "<td>" . $row['kodebarang'] . "</td>";
    echo "<td>" . $row['kodesupplier'] . "</td>";
    echo "<td>" . $row['qty'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "</tr>"; */
}
mysqli_close($con);
?>
</body>
</html>