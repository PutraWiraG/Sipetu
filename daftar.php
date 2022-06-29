<!DOCTYPE html>
<html>
<head>
	<title>Daftar Account Siswa</title>
	<style>
		h1 {
  			text-align: center;
			}
	</style>
</head>
<body>

	<h1>Daftar Akun Siswa</h1>
	<hr>

	<form action="prosesDaftar.php" method="POST" name="input">
	<table>
		<tr>
			<td>Nis</td>
			<td>:</td>
			<td><input type="text" name="nis" placeholder="Nis"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="Nama"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="pass" placeholder="Password"></td>
		</tr>
		<tr>
			<td><button> Daftar </button></td></form>	
		</tr>
	</table>
	

</body>
</html>