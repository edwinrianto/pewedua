<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
	<?php
	$kabupaten=[
		[
			"id"=>1,
			"nama_kab"=>"Pontianak"
		],
		[
			"id"=>2,
			"nama_kab"=>"Mempawah"
		],
		[
			"id"=>3,
			"nama_kab"=>"Sintang"
		]
	];
	?>
<h1>Registrasi</h1>
<form method="POST" action="proses.php">
<table>
	<tr>
	<td>username</td>
	<td>:<input type="text" name="username"></td>
</tr>
<tr>
	<td>password</td>
	<td>:<input type="Password" name="password"></td>
</tr>
<tr>
	<td>nama</td>
	<td>:<input type="text" name="nama"></td>
</tr>
<tr>
	<td>No Hp</td>
	<td>:<input type="Number" name="nohp"></td>
</tr>
<tr>
	<td>alamat</td>
	<td><textarea name="alamat" cols="22" rows="3" ></textarea></td>
</tr>
<tr>
	<td>Kabupaten</td>
	<td><select name="kabupaten">
		<?php foreach ($variable as $key => $value):?> 
		<option value="<?php echo $kab['id']?>"><?php echo $kab['nama_kab']?></option>
		
	<?php endforeach ?>
		
	</select>
	</td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td><input type="radio" name="jenkel">Laki-Laki
	<input type="radio" name="jenkel">Perempuan</td>
</tr>
<tr>
	<td>Prodi Pilihan</td>
	<td>
		<input type="checkbox" name="sisteminformasi">Sistem Informasi<br>
		<input type="checkbox" name="sistemkomputer">Sistem Komputer<br>
		<input type="checkbox" name="informatika">Informatika<br>
	</td>
</tr>
<tr>
	<td><input type="submit" value="simpan"></td>
</tr>
</table>
</form>
</body>
</html>