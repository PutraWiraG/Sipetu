<?php
session_start();

include 'config.php';
	
	
    if(isset($_SESSION['id'])){    	

$id=$_POST['id'];

mysqli_query($host,"DELETE FROM MAPEL WHERE id_mapel = '$id'");

?>

<script>
alert("Data Telah Terhapus");
</script>

<?php
echo "<script>window.location='mapel.php'</script>";
	}else{
		echo "Error";
	}
?>


