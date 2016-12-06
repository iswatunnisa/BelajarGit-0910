<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = $_GET['id'];

if(!is_numeric($id)){
	exit('Access Forbiden');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$dt=$data[0];
$nation = new nationality;

$data_nation = $nation->readAllNationality();

if (empty($data)) {
	exit('Siswa is not found');
}

?>

<h1>Edit Data Siswa </h1>
<form action="editsiswa.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
NIS: <br/>
	<input type="text" value= "<?php echo $dt ['id_siswa'] ?>" name="in_nis" readonly="true"><br/>
Nama Lengkap <br/>
	<input type="text" name="in_name" value= "<?php echo $dt ['full_name'] ?>" ><br/>
Email: <br/>
	<input type="text"  name="in_email" value= "<?php echo $dt ['email'] ?>"><br/>
Kewarganegaraan: 
	
	<select name="in_nation">
<option value=" "> --Pilih Negara-- </option>
	<?php 
	foreach ($data_nation as $n) : ?>
	<option value="<?php echo $n['id_nationality']?>">
	<?php $s= ($dt['id_nationality']==$n['id_nationality'])?"selected":""?>
	<?php echo $n['nationality']?>
	<option value="<?php echo $n ['id_nationality'] ?>" <?php echo $s?>>
	<?php echo $n['nationality'] ?>
	</option>
	<?php endforeach?>
</select><br/>
Foto: <input type="file" name="in_foto" /><br/>
<?php if(!empty($dt['foto'])):?>
	<img src="<?php echo $dt['foto']?>" width="100"/>
	<?php endif?>
	<br />
<input type="submit" name="kirim" value="Simpan">
</form>

<a href="siswa.php">kembali</a>
