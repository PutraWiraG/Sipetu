<?php
session_start();

include 'config.php';
	
	
    if(isset($_SESSION['id'])){    	

$id=$_POST['id'];
$mapel=$_POST['mapel'];
$desk =$_POST['des'];
$ref =$_POST['ref'];
$dead=$_POST['dead'];  
$user=$_POST['user'];
$stat=$_POST['status'];
$nm_file = $_FILES["file"]["name"];
$ukuran_file = $_FILES["file"]["size"];
$type = $_FILES["file"]["type"];
$tmp_file = $_FILES["file"]["tmp_name"];
$dir = "file/$nm_file";


move_uploaded_file($tmp_file, $dir);
mysqli_query($host,"UPDATE `tugas` SET `id_tugas`='$id',`mapel`='$mapel',`user`='$user',`deskripsi`='$desk',`referensi`='$ref',`deadline`='$dead',`file`='$nm_file',`status`='$stat' WHERE `id_tugas`='$id'");
?>

<script>
alert("Tugas Selesai");
</script>

<?php
echo "<script>window.location='home.php'</script>";
	}else{
		echo "Error";
	}
?>


