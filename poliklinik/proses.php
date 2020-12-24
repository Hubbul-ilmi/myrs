<?php
require_once '../_config/config.php';
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
	$total = $_POST['total'];
	for ($i=1; $i <=$total; $i++) { 
		$uuid = Uuid::uuid4()->toString();
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama-'.$i]));
		$gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-'.$i]));
		$sql = mysqli_query($con, "INSERT INTO tb_poli (id_poli, nama_poli, gedung) VALUES ('$uuid', '$nama', '$gedung')") or die (mysqli_error($con));
	}
	if($sql){
	?>
	<script type="text/javascript">
		alert('<?=$total?> Data Berhasil Ditambahkan!');
		window.location='data.php';
	</script>
	<?php
	}else{
	?>
	<script type="text/javascript">
		alert('Gagal Tambah Data Coba Lagi!');
		window.location='generate.php';
	</script>
	<?php
	}
}else if(isset($_POST['edit'])){

	for ($i=0; $i<count($_POST['id']); $i++) { 
		$id = $_POST['id'][$i];
		$nama = $_POST['nama'][$i];
		$gedung = $_POST['gedung'][$i];
		$sql = mysqli_query($con, "UPDATE tb_poli SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'") or die (mysqli_error($con));
	}
	if($sql){
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diupdate!');
			window.location='data.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('Gagal Update!');
			window.location='data.php';
		</script>
		<?php
	}
}