<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>


</head>


<body>

    <div class="container halaman">
        <h1 class="h1"> Material Masuk</h1>
        <p class="text-right">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modaltambah">
                tambah
            </button>
        </p>

        <table class="display text-center" id="myTable">
            <thead>
                <th>no</th>
                <th>Warehouse Kode</th>
                <th>Material Code</th>
                <th>Material Name</th>
                <th>Order Qty</th>
                <th>Price</th>
                <th>action</th>
            </thead>
            <tbody style="text-center">
                <?php
                    include"koneksi.php";
                    $no = 1;
                    $data = mysqli_query($conn, "SELECT * from warehouse  INNER JOIN purchasing on warehouse.purchase_id = purchasing.id INNER JOIN barang on purchasing.kodebarang = barang.kodebarang");
                    foreach ($data as $row) {
                        ?>
                <tr>
                    <td>
                        <?php echo $no; ?>
                    </td>
                    <td>
                        <?php echo $row['kodewh']; ?>
                    </td>
                    <td>
                        <?php echo $row['kodebarang']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['qty']; ?>
                    </td>
                    <td>
                        <?php echo $row['price']; ?>
                    </td>

                    <td>
                        <input type="hidden" value="<?php echo $row['id']; ?>" />
                        <button type="button" class="btn btn-primary " href="tambahmaster.php">
                            Save
                        </button>
                    </td>
                </tr>

                <?php
                $no++;
                    }
                ?>



            </tbody>
            <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>
        </table>


</body>

</html>


<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php
    
                include "koneksi.php";
                // mencari kode barang dengan nilai paling besar
                $query = "SELECT max(kodewh) as maxKode FROM warehouse";
                $hasil = mysqli_query($conn, $query);
                $data = mysqli_fetch_array($hasil);
                $kodesupplier = $data['maxKode'];
                
                // mengambil angka atau bilangan dalam kode anggota terbesar,
                // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                // misal 'BRG001', akan diambil '001'
                // setelah substring bilangan diambil lantas dicasting menjadi integer
                $noUrut = (int) substr($kodesupplier, 3, 3);
                
                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                $noUrut++;
                
                // membentuk kode anggota baru
                // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                $char = "S";
                $kodesupplier = $char . sprintf("%04s", $noUrut);

            ?>

                <form method="post" action="tambahwh.php">
                    <div class="d-block asd">
                        <label>
                            <? include 'koneksi.php';
                            $data3 = mysqli_query($conn, "SELECT qty FROM purchasing") ?>
                            <input type="text" id="qty" name="qty" value="<?php echo $qty; ?>" required />
                            <!-- <div class="label-text">Warehouse Kode</div> -->
                        </label>
                        <br>

                        <label>
                            <input type="text" id="kodewh" name="kodewh" value="<?php echo $kodesupplier; ?>"
                                required />
                            <div class="label-text">Warehouse Kode</div>
                        </label>

                <? 
                include 'koneksi.php';
                $data1 = mysqli_query ($conn, "select * from purchasing"); ?>

                        <div class="form-group">
                            <label for="example">supplier</label>
                            <select class="form-control" name="purchase_id" id="purchase_id"
                                onchange="showDetail(this.value)" required>
                                <option value="">Pilih Kode Order</option>
                                <?php 
                                    while ($hasil1 = mysqli_fetch_array ($data1))
                                        {
                                    ?>
                                <option value="<?php echo $hasil1['id'] ?> ">
                                    <?php echo $hasil1['kodepurchase'] ?>
                                </option>

                                <? }
                                    ?>

                            </select>
                        </div>
                        <div id="txtHint">Material masuk info will be listed here...</div> <br>
                    </div>
                    <div class="text-right mr-5">
                        <button type="reset" value="reset" class="btn btn-secondary">Batal</button>
                        <button type="submit" value="Submit" class="btn btn-primary">Tampilkan</button>
                        <!-- <input type="submit" value="Submit" /> -->
                    </div>

                </form>


                <br>

            </div>
        </div>
    </div>
</div>

</body>


<script>
    function showDetail(str) {
        var xhttp;
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getData.php?q=" + str, true);
        xhttp.send();
    }
</script>