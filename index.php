










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="style/bootstrap.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="st.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
</head>

<body>

    <br>
    <div class="container">
        <div class="card cardnav">
            <ul class="top-level-menu">
                <li><a href="index.php?hal=home">Home</a></li>
                <li>
                    <a href="#">Master
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="second-level-menu">
                        <li><a href="index.php?hal=material">Material</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Purchasing
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="second-level-menu">
                        <li><a href="index.php?hal=purchase">Purchasing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Warehouse
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="second-level-menu">
                        <li><a href="index.php?hal=warehouse">Material Masuk</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <br>
        <div>

            <div class="">

                <? 
                            if(!isset($_GET['hal'])){
                                echo "Terima kasih atas kunjungannya";
                            } else {
                                include "$_GET[hal].php";
                            }
                            
                        ?>
            </div>

        </div>
   
    </div>


  <script>
                $(document).ready(function () {
                    $('#myTable').DataTable();
                });
            </script>

 </table>
 </form>

</body>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha256-fzFFyH01cBVPYzl16KT40wqjhgPtq6FFUB6ckN2+GGw=" crossorigin="anonymous"></script>

 
</body>

</html>



