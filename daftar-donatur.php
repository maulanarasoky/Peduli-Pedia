<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="icon" href="images/page-icon.png">
	<script type="text/javascript" src="Ajax/Index/Donatur/daftar-donatur.js"></script>
</head>
<body>
	<div class="daftar-donatur">
		<div class="logo">
			<img src="Images/donatur-polos.jpg" />	
		</div>
		<div class="form">
				<table>
					<tr>
						<td><input type="text" name="namaDepan" placeholder="    Nama Depan" id="namaDepan"></td>
					</tr>
					<tr>
						<td><input type="text" name="namaBelakang" placeholder="    Nama Belakang" id="namaBelakang"></td>
					</tr>
					<tr>
						<td><input type="number" name="nik" placeholder="    NIK" id="nik"></td>
					</tr>
					<tr>
						<td><input type="text" name="username" placeholder="    Username" id="username"></td>
					</tr>
					<tr>
						<td><input type="email" name="email" placeholder="    Email" id="email"></td>
					</tr>
					<tr>
						<td><input type="password" name="password" placeholder="    Password" id="password"></td>
					</tr>
					<tr>
						<td><input type="password" name="password-re" placeholder="    Ketik Ulang Password" id="password-re"></td>
					</tr>
					<tr>
						<td><input type="submit" name="daftar" onclick="inputData();" value="Daftar"></td>
					</tr>
				</table>
				<p>Sudah punya akun ? <a href="index.php">Masuk</a></p>
		</div>
	</div>
</body>
</html>