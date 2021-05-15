<?php
	error_reporting(0);
    session_start();
    
    $koneksi = new mysqli("localhost","root","","db_perpustakaan");

    include "function.php";

    if($_SESSION['admin'] || $_SESSION['user']){

?>

<!DOCTYPE html>
<html xmlns=""> 
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LibraryKu</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LibraryKu</a> 
            </div>
  <div style="font-weight:bold; font-family:Calibri; color: black; padding: 15px 50px 5px 50px; float: right; font-size: 10px;">
  <?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
  </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php if ($_SESSION['user']) {?>
                        <li>
                        <a  href="index.php"><i class="fa fa-home fa-2x"></i> Halaman Utama</a>
                    </li>
                    <li>
                        <a href="?page=bukuUser"><i class="fa fa-book fa-2x"></i> Buku Pinjaman</a>
                     </li>
                    <li>
                        <a  href="?page=transaksi"><i class="fa fa-pencil-square fa-2x"></i></i>  Transaksi</a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['admin']) {?> 
                        <li>
                        <a  href="index.php"><i class="fa fa-home fa-2x"></i> Halaman Utama</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-2x"></i> Database<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a  href="?page=lokasi"></i>Rak Buku</a></li>
                            <li><a  href="?page=buku"></i>Data Buku</a></li>
                            <li><a  href="?page=anggota"></i>Anggota Perpustakaan</a></li>
                        </ul>
                    </li>
                     
                    <li>
                        <a  href="?page=pengguna"><i class="fa fa-users fa-2x"></i></i>Pengguna</a>
                    </li>
                    <?php }?>
                    

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     	
                     	<?php

                     		$page = $_GET['page'];
                            $aksi = $_GET['aksi'];
                             
                            if ($page == "bukuUser"){
                                if ($aksi == ""){
                                    include "page/buku/bukuUser.php";
                                }
                            

                            }elseif ($page == "buku") {
                     			if ($aksi == "") {
                     				include "page/buku/buku.php";
                     			}elseif ($aksi== "tambah") {
                                    include "page/buku/tambah.php";
                                }elseif ($aksi== "ubah") {
                                    include "page/buku/ubah.php";
                                }elseif ($aksi== "hapus") {
                                    include "page/buku/hapus.php";
                                }elseif ($aksi== "cetak") {
                                    include "page/buku/form_laporan_buku.php";
                                }
                     		}elseif ($page == "lokasi" ) {
                                if ($aksi == "") {
                                    include "page/lokasi/lokasi.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/lokasi/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/lokasi/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/lokasi/hapus.php";
                                }
                            }elseif ($page == "anggota" ) {
                     			if ($aksi == "") {
                     				include "page/anggota/anggota.php";
                     			}elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                }elseif ($aksi== "cetak") {
                                    include "page/anggota/form_laporan_anggota.php";
                                }
                     		}elseif ($page == "transaksi" ) {
                     			if ($aksi == "") {
                     				include "page/transaksi/transaksi.php";
                     			}elseif ($aksi == "tambah") {
                                    include "page/transaksi/tambah.php";
                                }elseif ($aksi == "kembali") {
                                    include "page/transaksi/kembali.php";
                                }elseif ($aksi == "perpanjang") {
                                    include "page/transaksi/perpanjang.php";
                                }elseif ($aksi== "cetak") {
                                    include "page/transaksi/form_laporan_transaksi.php";
                                }
                     		}elseif ($page == "pengguna" ) {
                                if ($aksi == "") {
                                    include "page/pengguna/pengguna.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/pengguna/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/pengguna/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/pengguna/hapus.php";
                                }
                            }elseif ($page=="") {
                                include "home.php";
                            }

                     	?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    


    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    
   
</body>
</html>

<?php
    }else{
        header("location:login.php");
    }
?>
