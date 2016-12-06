<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$siswa = new Siswa();
$data = $siswa->readAllSiswa();

?>


<html>
<body>
<table border=1>
	<tr>
		<th>ID Siswa</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Nationality</th>
		
	</tr>
	<?php
		foreach ($data as $hasil):
	?>
	<tr>
		<td><?php echo $hasil['id_siswa']?></td>
		<td><?php echo $hasil['full_name']?></td>
		<td><?php echo $hasil['email']?></td>
		<td><?php echo $hasil['nationality']?></td>

		<td><a href="dsiswa.php?id=<?php echo $hasil['id_siswa']?>">Detail</a></td>
		<td><a href="usiswa.php?id=<?php echo $hasil['id_siswa']?> ">Edit</a></td>
		<td><a href="delsiswa.php?id=<?php echo $hasil['id_siswa']?> ">Delete</a></td>
		
	</tr>
	<?php endforeach ?> 
</table>
</body>
<html>