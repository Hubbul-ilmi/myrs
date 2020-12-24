<?php
include_once '../_header.php';

?>
    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Tambah Data Obat</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" id="nama" required autofocus>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea name="ket" class="form-control" id="ket" required></textarea>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>


<?php include_once '../_footer.php';?>