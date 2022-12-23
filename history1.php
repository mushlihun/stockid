<?php
include ("koneksi/koneksi.php");
session_start();
if(!isset($_SESSION['username'])) 
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
				<li class="active">Laporan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">History Transaksi</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data 100 transaksi terakhir</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="tgl" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="tgl" data-sortable="true">Tanggal</th>
						        <th data-field="nama"  data-sortable="true">Nama Barang</th>
								<th data-field="seater"  data-sortable="true">Satuan</th>
						        <th data-field="jenis" data-sortable="true">Alur</th>
								<th data-field="gudang" data-sortable="true">Gudang</th>
								<th data-field="do" data-sortable="true">No. DO</th>
								<th data-field="qty" data-sortable="true">Jumlah</th>
								<th data-field="ket" data-sortable="true">Keterangan</th>
								<th data-field="action">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
//---------------------------------------------- INSERT TABLE ------------------------------------------------------
							
							if(substr($_SESSION['level'],0,6)=='gudang')
							{
								$sqlcari=mysqli_query($con,"select * from gudang where kode_gudang='$_SESSION[level]'");
								$dtcari=mysqli_fetch_array($sqlcari);
								$idgudang=$dtcari['id_gudang'];
								$sqltrx="select t.id_transaksi,t.tgl_transaksi,t.jenis_transaksi,t.id_barang,t.id_gudang,t.no_do,t.jumlah,t.keterangan,b.nama_barang,b.satuan,g.nama_gudang from transaksi t, barang b, gudang g where (t.id_barang=b.id_barang) and (t.id_gudang=g.id_gudang) and (t.id_gudang=$idgudang) order by t.id_transaksi desc limit 0,100";
							}
							else
							{
								$sqltrx="select t.id_transaksi,t.tgl_transaksi,t.jenis_transaksi,t.id_barang,t.id_gudang,t.no_do,t.jumlah,t.keterangan,b.nama_barang,b.satuan,g.nama_gudang from transaksi t, barang b, gudang g where (t.id_barang=b.id_barang) and (t.id_gudang=g.id_gudang) order by t.id_transaksi desc limit 0,100";				
							}
							
							$querytrx=mysqli_query($con,$sqltrx);
							while ($datatrx=mysqli_fetch_array($querytrx))
							{
							echo '
							<tr>
						        <td data-field="tgl" data-sortable="true">'.$datatrx['tgl_transaksi'].'</td>
						        <td data-field="nama"  data-sortable="true">'.$datatrx['nama_barang'].'</td>
								<td data-field="seater"  data-sortable="true">'.$datatrx['satuan'].'</td>
								<td data-field="jenis"  data-sortable="true">'.$datatrx['jenis_transaksi'].'</td>
								<td data-field="gudang"  data-sortable="true">'.$datatrx['nama_gudang'].'</td>
								<td data-field="do"  data-sortable="true">'.$datatrx['no_do'].'</td>
						        <td data-field="qty" data-sortable="true">'.$datatrx['jumlah'].'</td>
								<td data-field="ket" data-sortable="true">'.$datatrx['keterangan'].'</td>
								<td data-field="action"><a href="edit-transaksi.php?idt='.$datatrx['id_transaksi'].'&idb='.$datatrx['id_barang'].'"><span class="glyphicon glyphicon-pencil" title="Edit keterangan"></a></td>
						    </tr>';
							}
//---------------------------------------------- INSERT TABLE ------------------------------------------------------							
							?>
							
							
						    </tbody>
						</table>
					</div>
					<div class="panel-body"><span class="glyphicon glyphicon-download-alt"></span> <a href="download-history.php">Download Excel</a></div>
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
