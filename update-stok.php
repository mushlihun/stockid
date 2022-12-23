<?php
include("koneksi/koneksi.php");

date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tgl = date("Y-m-d",$tanggal);

//$tgl=date("Y-m-d");

$alur=$_POST['jenis'];
$barang=$_POST['barang'];
$gudang=$_POST['gudang'];
$do=$_POST['do'];
$jumlah=$_POST['jumlah'];
$ket=$_POST['ket'];

if($alur=="Masuk")
{
	if(!(is_numeric($jumlah)))
	{
		echo '<script>alert(\'Jumlah harus angka numerik.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
	}
	
	$simpan=mysqli_query($con,"insert into transaksi(tgl_transaksi,jenis_transaksi,id_barang,id_gudang,no_do,jumlah,keterangan) 
	values ('$tgl','$alur','$barang','$gudang','$do','$jumlah','$ket')");
	if(!($simpan))
	{
		echo '<script>alert(\'Transaksi gagal diproses.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
	}
	
	$qrbrg=mysqli_query($con,"select * from posisi where (id_barang='$barang') and (id_gudang='$gudang')");
	$baris=mysqli_num_rows($qrbrg);
	
	if($baris > 0)
	{
		$dtbrg=mysqli_fetch_array($qrbrg);
		$stokbaru=$dtbrg['stok']+$jumlah;
		
		$update=mysqli_query($con,"update posisi set stok='$stokbaru' where (id_barang='$barang') and (id_gudang='$gudang')");
		if($update)
		{
			echo '<script>alert(\'Transaksi berhasil.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';			
		}
		else
		{
			echo '<script>alert(\'Update stok gagal!\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
		}
	}
	else
	{
		$input=mysqli_query($con,"insert into posisi(id_barang,id_gudang,stok) values ('$barang','$gudang','$jumlah')");
		if($input)
		{
			echo '<script>alert(\'Transaksi berhasil.\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';			
		}
		else
		{
			echo '<script>alert(\'Input stok gagal!\')
			setTimeout(\'location.href="transaksi1.php"\' ,0);</script>';
			exit;
		}
	}
	
}

else if($alur=="Keluar")
{
	if(!(is_numeric($jumlah)))
	{
		echo '<script>alert(\'Jumlah harus angka numerik.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
	
	$qrbrg=mysqli_query($con,"select * from posisi where (id_barang='$barang') and (id_gudang='$gudang')");
	$baris=mysqli_num_rows($qrbrg);
	
	if($baris > 0)
	{
		$dtbrg=mysqli_fetch_array($qrbrg);
			
		if($jumlah>$dtbrg['stok'])
		{
			echo '<script>alert(\'Transaksi dibatalkan, Stok tidak mencukupi.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
		}
		
		$simpan=mysqli_query($con,"insert into transaksi(tgl_transaksi,jenis_transaksi,id_barang,id_gudang,no_do,jumlah,keterangan) 
		values ('$tgl','$alur','$barang','$gudang','$do','$jumlah','$ket')");
		if(!($simpan))
		{
			echo '<script>alert(\'Transaksi gagal diproses.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
		}
	
		$idposisi=$dtbrg['id_posisi'];
		$stokbaru=$dtbrg['stok']-$jumlah;
	
		$update=mysqli_query($con,"update posisi set stok='$stokbaru' where id_posisi='$idposisi'");
		if($update)
		{
			echo '<script>alert(\'Transaksi berhasil, stok telah berkurang.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			
		}
		else
		{
			echo '<script>alert(\'Update stok gagal!\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
		}
	}
	else
	{
		echo '<script>alert(\'Barang tidak tersedia.\')
			setTimeout(\'location.href="transaksi2.php"\' ,0);</script>';
			exit;
	}
	
}

?>
