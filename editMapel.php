<?php
session_start();

include 'config.php';
	
	
    if(isset($_SESSION['id'])){    	

$id=$_POST['id'];
$mapel=$_POST['mapel'];
$user =$_POST['user'];

mysqli_query($host,"UPDATE `mapel` SET `id_mapel`='$id',`mapel`='$mapel',`user`='$user' WHERE `id_mapel`='$id'");
?>

<script>
alert("Data Telah diUbah");
</script>

<?php
echo "<script>window.location='mapel.php'</script>";
	}else{
		echo "Error";
	}
?>


