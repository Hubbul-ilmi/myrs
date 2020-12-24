<?php
include_once '../_header.php';

?>
    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Edit Data Dokter</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['dokter'];
            $query = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die (mysqli_error($con));
            $data = mysqli_fetch_array($query);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="dokter" value="<?=$data['id_dokter']?>">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" name="nama" class="form-control" value="<?=$data['nama_dokter']?>" id="nama" required autofocus>
                </div>
                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input type="text" name="spesialis" class="form-control" value="<?=$data['spesialis']?>" id="spesialis" required autofocus>
                </div>
                <div class="form-group">
                    <label for="ket">Alamat</label>
                    <textarea name="alamat" class="form-control" id="ket" required><?=$data['alamat']?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telephone</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp" value="<?=$data['no_telp']?>" maxlength="12" pattern="[0-9]+" required autofocus>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>


<?php include_once '../_footer.php';?>