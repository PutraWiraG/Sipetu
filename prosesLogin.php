
<?php
session_start();
include 'config.php';

if(isset($_POST['user'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$kode;
	
	
		$query=mysqli_query($host,"SELECT * FROM user WHERE id_user='$user' and Password='$pass'");
		$cek=mysqli_num_rows($query);
		$d=mysqli_fetch_assoc($query);

		

		if($cek>0){
			$_SESSION['Username']=$d['NamaUser'];
			$_SESSION['id']=$d['id_user'];
			header("location:home.php");
		
		
			
		}else{
			echo "<a class='btn btn-outline-danger'>Maaf, Login Kamu Gagal. Apakah Username dan Password Kamu Sudah Cocok??</a>";
			
		}
			
}else{
	
	echo"Masih Kosong";
	
}
	echo"<br><br><br><a href='index.php' class='btn btn-outline-danger'>Kembali</a>";
?>
