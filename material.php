


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
                $data = mysqli_query($conn, "SELECT material.idmaterial, purchasing.kodebarang, material.last_stock + purchasing.qty as jumlah FROM material, purchasing GROUP BY idmaterial ");
                foreach ($data as $row) {
                    ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $row['idmaterial']; ?>
                    </td>
                    <td>
                        <?php echo $row['kodebarang']; ?>
                    </td>
                    <td>
                        <?php echo $row['jumlah']; ?>
                    </td>

                    <td>
                        <input type="hidden"  value="<?php echo $row['id']; ?>"/>
                         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modaledit"  >
                            edit
                        </button>
                        &nbsp;
                         <button class="btn btn-danger" onclick="location.href='delete.php?id=<?php echo  $row['id']; ?>';" value="Delete">Hapus</button>
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
                        $query = "SELECT max(kodesupplier) as maxKode FROM supplier";
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
                        
        <form method="post" action="supplier/tambahproses.php">
          <div class="d-block asd">
            <label>
              <input type="text" id="kodesuppplier" name="kodesupplier" value="<?php echo $kodesupplier; ?>"  required />
              <div class="label-text">perusahaan</div>
            </label>
            <br />
            <label>
              <input type="text" id="perusahaan" name="perusahaan"  required />
              <div class="label-text">perusahaan</div>
            </label>
            <br />
            <label>
              <input type="text" id="alamat" name="alamat" required />
              <div class="label-text">Alamat </div>
            </label>
            <br>
            <label>
              <input type="text" id="email" name="email" required />
              <div class="label-text">Email</div>
            </label>
            <br>
            <label>
              <input type="text" id="nohp" name="nohp" required />
              <div class="label-text">No. hp</div>
            </label>
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
