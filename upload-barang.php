<?php
include ("koneksi/koneksi.php");
error_reporting("_ALL");
session_start();
if(!isset($_SESSION['username']) or ($_SESSION['level']=='report')) 
{
	include("login.php");
	exit;
}
$pengguna=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aplikasi Stok Barang</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> E-Stock<span></span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
						<!-- ====================================================LOGIN -->
						<?php
						echo " $pengguna";
						?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="ganti-password.php"><span class="glyphicon glyphicon-user"></span> Ganti password</a></li>
							<!--<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>-->
							<li><a href="login/aksilogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<!--	
	==================================================== MENU
	-->
	<?php
	include("menu.php");
	?>	
	
	<!--	
	==================================================== MENU
	-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Upload Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						
			<?php
			include "excel_reader2.php";
			
            $nama_file   = $_FILES['userfile']['name'];
			$ext = strtolower(end(explode('.', $nama_file)));
            $valid_ext = array('xls','xlsx');
			
			if(!(in_array($ext, $valid_ext)))
			{
				echo '<script>alert(\'Tipe file salah, File yang diijinkan format .xls atau .xlsx\')
				setTimeout(\'location.href="barang.php"\' ,0);</script>';
				exit;
			}
  
			// membaca file excel yang diupload
			$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

			// membaca jumlah baris dari data excel
			$baris = $data->rowcount($sheet_index=0);

			// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
			$sukses = 0;
			$gagal = 0;

			// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
			for ($i=2; $i<=$baris; $i++)
			{
  				// membaca data id (kolom ke-1)
  				//$id = $data->val($i, 1);
 				
				// membaca data nama barang (kolom ke-2)
 				$nama = $data->val($i, 1);
  			
				// membaca data satuan(kolom ke-3)
 				$satuan= $data->val($i, 2);
  				
				// membaca data nama kontak (kolom ke-5)
 				$hbeli = $data->val($i, 3);
  				
				// membaca data email kontak (kolom ke-6)
  				$hjual = $data->val($i, 4);

  				// setelah data dibaca, sisipkan ke dalam tabel mhs
  				$query = "INSERT INTO barang(nama_barang,satuan,harga_beli,harga_jual) VALUES ('$nama','$satuan','$hbeli','$hjual')";
  				$hasil = mysqli_query($con,$query);

  				// jika proses insert data sukses, maka counter $sukses bertambah
  				// jika gagal, maka counter $gagal yang bertambah
  				if ($hasil) $sukses++;
  				else $gagal++;
			}

			
			echo "<h3>Proses import data selesai.</h3><br>";
			echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
			echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
			echo "<br><a href='import-barang.php'><button type='button' class='btn btn-primary'>Upload Lagi</button></a>&nbsp; ";
			echo "&nbsp; <a href='barang.php'><button type='button' class='btn btn-green'>Lihat Hasil</button></a>";

?>
			
					</div>
				</div>
			</div>
		</div><!--/.row-->	
			
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
	<script src="js/jquery.easy-pie-chart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
