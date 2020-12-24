<?php
include_once '../_header.php';

?>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="identitas">No. Identitas</label>
                    <input type="text" name="identitas" class="form-control" id="identitas" maxlength="20" pattern="[0-9]+" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="jk" id="jk" value="L" required>  Laki - Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jk" id="jk" value="P" required>  Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket">Alamat</label>
                    <textarea name="alamat" class="form-control" id="ket" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telephone</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp" maxlength="12" pattern="[0-9]+" required autofocus>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>


<?php include_once '../_footer.php';?>