<?php
require_once '../_config/config.php';
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama_obat']));
	$keterangan = trim(mysqli_real_escape_string($con, $_POST['ket']));
	mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nama', '$keterangan')") or die (mysqli_error($con));
	?>
	<script type="text/javascript">
		window.location='data.php';
	</script>
	<?php
}else if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama_obat']));
	$keterangan = trim(mysqli_real_escape_string($con, $_POST['ket']));
	mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$keterangan' WHERE id_obat = '$id'") or die(mysqli_error($id));
	?>
	<script type="text/javascript">
		window.location='data.php';
	</script>
	<?php
}