


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
   

</head>


<body>

    <div class="container halaman">
    <h1 class="h1"> Material Records</h1>
        <p class="text-right">
         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modaltambah">
            tambah
        </button>
       </p>

         <table class="display text-center" id="myTable">
            <thead>
                <th>no</th>
                <th>kode material</th>
                <th>kode barang</th>
                <th>last stock</th>
                <th>action</th>
            </thead>
            <tbody style="text-center">
              <?php
                include"koneksi.php";
                $no = 1;
                $data = mysqli_query($conn, "SELECT  barang.kodebarang, barang.name , material.last_stock FROM  barang, material where material.kodebarang =  barang.id ");
                // foreach ($data as $row) {
                  foreach($data as $row)
                  {
                    ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $row['kodebarang']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['last_stock']; ?>
                    </td>

                    <td>
                        <input type="hidden"  value="<?php echo $row['id']; ?>"/>
                         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modaledit"  >
                            edit
                        </button>
                        &nbsp;
                        <button class="btn btn-danger"
                            onclick="location.href='deletem.php?id=<?php echo  $row['id']; ?>';"
                            value="Delete">Hapus</button>
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
                        $query = "SELECT max(idmaterial) as maxKode FROM material";
                        $hasil = mysqli_query($conn, $query);
                        $data = mysqli_fetch_array($hasil);
                        $idmaterial = $data['maxKode'];
                        
                        // mengambil angka atau bilangan dalam kode anggota terbesar,
                        // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                        // misal 'BRG001', akan diambil '001'
                        // setelah substring bilangan diambil lantas dicasting menjadi integer
                        $noUrut = (int) substr($idmaterial, 3, 3);
                        
                        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                        $noUrut++;
                        
                        // membentuk kode anggota baru
                        // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                        // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                        // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                        $char = "M";
                        $idmaterial = $char . sprintf("%04s", $noUrut);

                        ?>
                        
        <form method="post" action="materialtambah.php">
          <div class="d-block asd">
            <label>
              <input type="text" id="idmaterial" name="idmaterial" value="<?php echo $idmaterial; ?>"  required />
              <div class="label-text">perusahaan</div>
            </label>
            <? 
                include 'koneksi.php';
                $data1 = mysqli_query ($conn, "select * from barang"); ?>

                        <div class="form-group">
                            <label for="example">supplier</label>
                            <select class="form-control" name="kodebarang" id="kodebarang"
                                onchange="showDetail(this.value)" required>
                                <option value="">Pilih Kode Order</option>
                                <?php 
                                    while ($hasil1 = mysqli_fetch_array ($data1))
                                        {
                                    ?>
                                <option value="<?php echo $asd = $hasil1['id'] ?> ">
                                    <?php echo $hasil1['name'] ?>
                                </option>

                                <? }
                                    ?>

                            </select>
                        </div>
          </div>
          <div class="text-right mr-5">
            <button type="reset" value="reset" class="btn btn-secondary">Batal</button>
            <button type="submit" value="Submit" class="btn btn-primary">Tambah</button>
            <!-- <input type="submit" value="Submit" /> -->
          </div>`
        </form>

      </div>
    </div>
  </div>
</div>

</body>
