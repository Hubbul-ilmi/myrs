<?php
require_once '../_config/config.php';
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
	$alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
	$telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

	$cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE no_identitas = '$identitas'");
	if(mysqli_num_rows($cek_identitas) > 0){
		?>
		<script type="text/javascript">alert('No Identitas  Sudah Terdaftar!'); window.location='add.php';</script>
		<?php
	}else{
	mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, no_identitas, nama_pasien, jk, alamat, no_telp) VALUES ('$uuid','$identitas', '$nama', '$jk', '$alamat', '$telp')") or die (mysqli_error($con));
	?>
	<script type="text/javascript">
		window.location='data.php';
	</script>
	<?php
	}

}else if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
	$alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
	$telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

	$cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE no_identitas = '$identitas' AND id_pasien != '$id'");
	if(mysqli_num_rows($cek_identitas)){
		?>
		<script type="text/javascript">alert('No Identitas  Sudah Terdaftar!'); window.location='edit.php?id=<?=$id?>';</script>
		<?php
	}else{

		mysqli_query($con, "UPDATE tb_pasien SET no_identitas = '$identitas', nama_pasien = '$nama', jk = '$jk', alamat = '$alamat', no_telp = '$telp' WHERE id_pasien = '$id'") or die(mysqli_error($id));
		?>
		<script type="text/javascript">
			window.location='data.php';
		</script>
		<?php

	}
}else if(isset($_POST['import'])){
	$file = $_FILES['file']['name'];
	$ekstensi = explode(".", $file);
	$file_name = "file-".round(microtime(true)).".".end($ekstensi);
	$sumber = $_FILES['file']['tmp_name'];
	$target_dir = '../_file/';
	$target = $target_dir.$file_name;
	move_uploaded_file($sumber, $target);

	$object = PHPExcel_IOFactory::load($target);
	$all_data = $object->getActiveSheet()->toArray(null, true, true, true);

	$sql = "INSERT INTO tb_pasien (id_pasien,no_identitas, nama_pasien, jk, alamat, no_telp) VALUES";
	for ($i=2; $i <=count($all_data) ; $i++) { 
		$uuid = Uuid::uuid4()->toString();
		$no_id = $all_data[$i]['A'];
		$nama_pasien = $all_data[$i]['B'];
		$jk = $all_data[$i]['C'];
		$alamat = $all_data[$i]['D'];
		$telp = $all_data[$i]['E'];

		$sql .=" ('$uuid', '$no_id', '$nama_pasien', '$jk', '$alamat', '$telp'),";
	}
	$sql = substr($sql, 0, -1);

	mysqli_query($con, $sql)or die(mysqli_error($con));
	unlink($target);
	?><script type="text/javascript">window.location='data.php';</script><?php
}