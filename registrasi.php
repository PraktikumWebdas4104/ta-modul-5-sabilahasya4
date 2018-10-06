<body bgcolor="skyblue" align="center">
	<h1>FORMULIR REGISTRASI MAHASISWA UNIVERSITAS TELKOM</h1>
<form method="POST">
<table>
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>NAMA :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>EMAIL:</td>
		<td><input type="email" name="email"></td>
	</tr>
	<tr>
		<td><input type="radio" name="jk" value="laki-laki" checked>Laki-laki<br></td>
  		<td><input type="radio" name="jk" value="perempuan">Perempuan<br></td>
	</tr>
	<tr>
		<td><select name="prodi" required>
 			<option value="mi">D3 Manajemen Informatika</option>
  			<option value="mp">D3 Manajemen Pemasaran</option>
  			<option value="perhotelan">D3 Perhotelan</option>
  			<option value="tektel">D3 Teknik Telekomunikasi</option>
  			<option value="ka">D3 Komputerisasi Akutansi</option>
  			<option value="if">D3 Teknik Informatika</option>
  			<option value="ilkom">S1 Ilmu Komunikasi</option>
  			<option value="mbti">S1 Manajemen Bisnis Telekomunikasi Informatika</option>
			<option value="dkv">S1 Desain Komunikasi Visual</option>
			<option value="di">S1 Design Interior</option>
			<option value="sisfo">S1 Sistem Informasi</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><select name="fakultas" required>
 			<option value="fit">FAKULTAS ILMU TERAPAN</option>
  			<option value="fik">FAKULTAS INDUSTRI KREATIF</option>
  			<option value="feb">FAKULTAS EKONOMI BISNIS</option>
  			<option value="fkb">FAKULTAS KOMUNIKASI BISNIS</option>
		</td>
	</tr>
	<tr>
		<td>Hobi : <br/>
			<input type="checkbox" name="hobi" value="berenang">Berenang<br/>
			<input type="checkbox" name="hobi" value="hiking">Hiking<br/>
			<input type="checkbox" name="hobi" value="diving">Diving<br/>
			<input type="checkbox" name="hobi" value="mancing">Mancing<br/>
			<input type="checkbox" name="hobi" value="nonton film">Nonton Film<br/><br/>
			<input type="reset" name="delete" value="Delete Hobi"><br/><br/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="DAFTAR"></td>
	</tr>
</table>
</form>
</body>

<?php 
	if(isset($_POST['submit'])){
		include("koneksiDB.php");
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		$hobi = $_POST['hobi'];
		$status=true;

		if (!is_int($nim) and (strlen($nim)<10) or (strlen($nim)>10)) {
			echo("NIM harus angka dan 10 karakter");
			$status=false;
		}

		if (!preg_match('/^[a-z A-Z]$/i', $nama) and strlen($nama)>25) {
			echo("Nama harus huruf dengan maksimal 25 karakter");
			$status=false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo("Email sesuai ketentuan email pada umumnya");
			$status=false;
		}
		if($status){
			$sql=mysqli_query($koneksi,"INSERT INTO mahasiswa
				VALUES ($nim, '$nama', '$email', '$jk', '$prodi', '$fakultas', '$hobi')");
		}
	}
 ?>