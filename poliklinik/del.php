<?php
require_once '../_config/config.php';
$chek = @$_POST['checked'];
if(!isset($chek)){
	?>
	<script type="text/javascript">
		alert('Tidak Ada data yang dipilih!');
		window.location='data.php';
	</script>
	<?php
}else{ 
	foreach ($chek as $id ) {
		$sql = mysqli_query($con, "DELETE FROM tb_poli WHERE id_poli = '$id'") or die (mysqli_error($con));
	}

	if($sql){
		?>
		<script type="text/javascript">
			alert('<?=count($chek)?> Data Berhasil Dihapus!');
			window.location='data.php';
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('Data Gagal Dihapus!');
			window.location='data.php';
		</script>
		<?php
	}
}