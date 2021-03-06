<?php
$koneksi = new mysqli("localhost","root","","kas");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

     <!-- TABLE STYLES-->
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
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.html"><i class="glyphicon glyphicon-home fa-3x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="?page=masuk"><i class="glyphicon glyphicon-floppy-save fa-3x"></i>Kas Masuk</a>
                    </li>
                    <li>
                        <a  href="?page=keluar"><i class="glyphicon glyphicon-floppy-open fa-3x"></i> Kas Keluar</a>
                    </li>
						   <li  >
                        <a  href="?page=rekap"><i class="fa fa-bar-chart-o fa-3x"></i> Rekapitulasi Kas</a>
                    </li>	
                      <li  >
                        <a  href="?page=user"><i class="glyphicon glyphicon-user fa-3x"></i> Manajemen User</a>
                            </li>
                        </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    @$page = $_GET['page'];
                    @$aksi = $_GET['aksi'];

                    if($page=='keluar') {
                      if($aksi==''){
                        include "page/kas_keluar/keluar.php";
                      }
                    }
                     

                    elseif($page=='masuk') {
                      if($aksi==''){
                        include "page/kas_masuk/masuk.php";
                      } elseif ($aksi=='hapus') {
                        include "page/kas_masuk/hapus.php";
                      }
                    }

                   elseif($page=='rekap') {
                      if($aksi==''){
                        include "page/rekap/rekap.php";
                      }
                    }

                    elseif($page=='user') {
                      if($aksi==''){
                        include "page/user/user.php";
                      }
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
     <!-- DATA TABLE SCRIPTS -->
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
