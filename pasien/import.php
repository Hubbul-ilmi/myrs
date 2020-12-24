<?php
include_once '../_header.php';

?>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Import Data Pasien</small>
            <div class="pull-right">
            	 <a href="../_file/sample/pasien.xlsx" class="btn btn-default btn-flat btn-xs"><i class="glyphicon glyphicon-download-alt"></i> Download Format</a>
                <a href="data.php" class="btn btn-warning btn-flat btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">File Excel</label>
                    <input type="file" name="file" class="form-control" id="file" required autofocus>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="import" class="btn btn-success" value="Import">
                </div>
            </form>
        </div>
    </div>


<?php include_once '../_footer.php';?>