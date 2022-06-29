<?php

include 'config.php';

$Nis=$_POST['user'];
$Nama=$_POST['nama'];
$Password=$_POST['pass'];


mysqli_query($host,"INSERT INTO `user`(`id_user`, `NamaUser`, `Password`) VALUES ('$Nis', '$Nama', '$Password')");

?>

<script>
alert("Data Telah Disimpan");
</script>

<?php
echo "<script>window.location='index.php'</script>";

?>


