<?php include_once('../_header.php'); ?>

	<div class="box">
		<h1>Pasien</h1>
		<h4>
			<small>Data Pasien</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-flat btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add.php" class="btn btn-success btn-flat btn-xs"><i class="glyphicon glyphicon-plus"></i>  Tambah Pasien</a>
				<a href="import.php" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-import"></i>  Import</a>
			</div>
		</h4>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="pasien">
				<thead>
					<tr>
						<th>Nomor Identitas</th>
						<th>Nama Pasien</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No.Telephone</th>
						<th><i class="glyphicon glyphicon-cog"></i></th>
					</tr>
				</thead>
			</table>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#pasien').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": "pasien_data.php",
			        scrollY : "250px",
			        dom : "Bfrtip",
			        buttons : [
			        	{
			        		extend : 'pdf',
			        		oriented : 'potrait',
			        		pageSize : 'Legal',
			        		title : 'Data Pasien',
			        		download : 'open'
			        	},
			        	'csv', 'excel', 'print', 'copy'
			        ],
			        columnDefs:[
			        {
			        	"searchable": false,
			        	"orderable": false,
			        	"targets": 5,
			        	"render": function(data, type, row){
			        		var btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-flat btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a>  <a onclick=\"return confirm('Yakin hapus Data?')\" href=\"del.php?id="+data+"\" class=\"btn btn-danger btn-flat btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a> </center>";
			        		return btn;
			        	}
			        }
			        ],
			        "order":[1, "asc"]
			    } );
			} );
		</script>
	</div>

<?php include_once('../_footer.php'); ?>