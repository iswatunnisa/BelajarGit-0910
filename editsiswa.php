<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

if(isset($_POST['Kirim'])){
	exit('Access Forbidden');
}
$siswa= new Siswa();

$data['input_name'] = addcslashes $_POST['in_name'];
$data['input_email'] = $_POST['in_email'];
$data['input_nationality'] = $_POST['in_nation'];
$data['foto'] ='img/'.$_POST['in_nis'].'.png';

$siswa->updateSiswa($_POST['in_nis'], $data);

if(!copy($_FILES['in_foto']['tmp_name'],'img/'.$_POST['in_nis'].'.png')){
	exit('error upload file');
}

echo "Data siswa berhasil di update<br />";
echo "<a href='usiswa.php?id=".$_POST['in_nis']."'>Detail Siswa</a>";

?>