<?php
session_start();

include 'config.php';
	
	
    if(isset($_SESSION['id'])){    	

$user=$_SESSION['id'];
$mapel=$_POST['mapel'];
$desk =$_POST['deskripsi'];
$ref =$_POST['refrensi'];
$dead=$_POST['deadline'];  


mysqli_query($host,"INSERT INTO `TUGAS`(`ID_TUGAS`, `MAPEL`, `USER`, `DESKRIPSI`, `REFERENSI`, `DEADLINE`, `FILE`) VALUES ('', '$mapel', '$user', '$desk', '$ref', '$dead', '')");

?>

<script>
alert("Tugas Tersimpan");
</script>

<?php
echo "<script>window.location='home.php'</script>";
	}else{
		echo "Error";
	}
?>


