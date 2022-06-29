<?php
session_start();

include 'config.php';
	
	
    if(isset($_SESSION['id'])){    	

$user=$_SESSION['id'];
$mapel=$_POST['mapel'];





mysqli_query($host,"INSERT INTO `mapel`(`ID_MAPEL`, `MAPEL`, USER) VALUES ('', '$mapel', '$user')");

?>

<script>
alert("Data Telah Disimpan");
</script>

<?php
echo "<script>window.location='home.php'</script>";
	}else{
		echo "Error";
	}
?>


