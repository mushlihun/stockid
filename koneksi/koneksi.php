<?php
$server   ="localhost" ;
$username ="root";
$password =""; // Apabila tidak ada password ganti "1234" menjadi ""
$database ="estock2";

$con = @mysqli_connect("$server", "$username", "$password", "$database");
//cek koneksi error atau tidak
if (!$con) 
{
		echo "Error: " . mysqli_connect_error();
		exit();
}
?>