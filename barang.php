<?php
include ("koneksi/koneksi.php");
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
				<li class="active">Master</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="add-barang.php" class="btn btn-primary btn-md">Add Items</a>
					<?php
						if(($_SESSION['level']=='administrator') or ($_SESSION['level']=='gudang-pusat'))
						{
						echo '&nbsp;<a href="import-barang.php" class="btn btn-success btn-md">Import from Excel</a>';
						}
					?>
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <!--
								<th data-field="state" data-checkbox="true" >Item ID</th>-->
						        <th data-field="id" data-sortable="true">ID Barang</th>
								<th data-field="name"  data-sortable="true">Nama Barang</th>
								<th data-field="seater"  data-sortable="true">Satuan</th>
								<?php
									if(($_SESSION['level']=='administrator') or ($_SESSION['level']=='gudang-pusat'))
									{
									echo '<th data-field="hbeli"  data-sortable="true">Harga Beli</th>';
									}
								?>
								<th data-field="hjual"  data-sortable="true">Harga Jual</th>
								<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php
//---------------------------------------------- INSERT TABLE ------------------------------------------------------
							$sqlbarang="select * from barang order by nama_barang asc";				
							$querybarang=mysqli_query($con,$sqlbarang);
							while ($databarang=mysqli_fetch_array($querybarang))
							{
							echo '
							<tr>
						        <!--
								<td data-field="state" data-checkbox="true" >'.$databarang['id_barang'].'</td> -->
						        <td data-field="id" data-sortable="true">'.$databarang['id_barang'].'</td>						       
								<td data-field="name"  data-sortable="true">'.$databarang['nama_barang'].'</td>
								<td data-field="seater"  data-sortable="true">'.$databarang['satuan'].'</td>';
								
								if(($_SESSION['level']=='administrator') or ($_SESSION['level']=='gudang-pusat'))
								{
									echo '<td data-field="hbeli"  data-sortable="true">'.number_format($databarang['harga_beli'],0,",",".").'</td>';
								}
								
								echo'
								<td data-field="hjual"  data-sortable="true">'.number_format($databarang['harga_jual'],0,",",".").'</td>
								<td data-field="action" data-sortable="true">';
								
								if (($_SESSION['level']=="administrator") or ($_SESSION['level']=="gudang-pusat"))
								{
								echo'
								<a href="edit-barang.php?id='.$databarang['id_barang'].'"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;
								<a href="save-barang.php?id='.$databarang['id_barang'].'&mode=delete" onclick="return confirm(\'Anda Yakin Menghapus Data Ini?\')"><span class="glyphicon glyphicon-remove" title="Delete"></span></a>
								';
								}
								echo'
								</td>
						    </tr>';
							}
//---------------------------------------------- INSERT TABLE ------------------------------------------------------							
							?>
							
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		<!--
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Basic Table</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data2.json" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">Item ID</th>
						        <th data-field="name">Item Name</th>
						        <th data-field="price">Item Price</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Styled Table</div>
					<div class="panel-body">
						<table data-toggle="table" id="table-style" data-url="tables/data2.json" data-row-style="rowStyle">
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right" >Item ID</th>
						        <th data-field="name" >Item Name</th>
						        <th data-field="price" >Item Price</th>
						    </tr>
						    </thead>
						</table>
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div>--><!--/.row-->	
		
		
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
