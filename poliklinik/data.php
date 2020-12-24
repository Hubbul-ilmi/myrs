<?php include_once('../_header.php'); ?>

	<div class="box">
		<h1>Poliklinik</h1>
		<h4>
			<small>Data Poliklinik</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-flat btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="generate.php" class="btn btn-success btn-flat btn-xs"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>
			</div>
		</h4>
		<form action="" method="post" name="proses">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Poli</th>
						<th>Gedung</th>
						<th> 
							<center>
								<input type="checkbox" name="select_all" id="select_all" value="">			
							</center> 
						</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no= 1;
				$sql_poli = mysqli_query($con, "SELECT * FROM tb_poli") or die(mysqli_error($con));
				if(mysqli_num_rows($sql_poli) > 0){ 

					while($data = mysqli_fetch_array($sql_poli)){ ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data['nama_poli'] ?></td>
						<td><?=$data['gedung'] ?></td>
						<td align="center">
							<input type="checkbox" name="checked[]" class="check" value="<?=$data['id_poli'] ?>">
						</td>
					</tr>				
	
				<?php
					}
				}else{
					?>
					<tr>
						<td colspan="4" align="center">Data Tidak ditemukan!</td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</form>
		<div class="box pull-right">
			<button class="btn btn-warning btn-flat btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i> Edit</button>
			<button class="btn btn-danger btn-flat btn-sm" onclick="del()"><i class="glyphicon glyphicon-trash"></i>  Hapus</button>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#select_all").on('click', function() {
				if(this.checked) {
					$('.check').each(function() {
						this.checked = true;
					});
				}else{
					$('.check').each(function() {
						this.checked = false;
					});
				}
			});
			$('.check').on('click', function() {
				if($('.check:checked').length == $('.check').length) {
					$('#select_all').prop('checked', true)
				}else{
					$('#select_all').prop('checked', false)
				}
			})
		}); 

		function edit(){
			document.proses.action = 'edit.php';
			document.proses.submit();
		}

		function del(){
			var conf = confirm('Yakin Hapus Data?');
			if(conf){
				document.proses.action = 'del.php';
				document.proses.submit();
			}
		}
	</script>

<?php include_once('../_footer.php'); ?>