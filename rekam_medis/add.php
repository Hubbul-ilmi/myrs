<?php
include_once '../_header.php';

?>
    <div class="box">
        <h1>Rekam Medis</h1>
        <h4>
            <small>Tambah Rekam Medis</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="pasien">Pasien</label>
                    <select name="pasien" id="pasien" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php
                        $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_pasien)){ ?>
                        <option value="<?=$data['id_pasien']?>"><?=$data['nama_pasien']?></option>
                     <?php }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea name="keluhan" class="form-control" id="keluhan" required></textarea>
                </div>
                <div class="form-group">
                    <label for="dokter">Dokter</label>
                    <select name="dokter" id="dokter" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php
                        $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_dokter)){ ?>
                        <option value="<?=$data['id_dokter']?>"><?=$data['nama_dokter']?></option>
                     <?php }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <textarea name="diagnosa" class="form-control" id="diagnosa" required></textarea>
                </div>
                <div class="form-group">
                    <label for="poli">Poliklinik</label>
                    <select name="poli" id="poli" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <?php
                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_poli") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_poli)){ ?>
                        <option value="<?=$data['id_poli']?>"><?=$data['nama_poli']?></option>
                     <?php }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="obat">Obat</label>
                    <select multiple name="obat[]" id="obat" class="form-control" size="7" required>
                        <?php
                        $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_obat)){ ?>
                        <option value="<?=$data['id_obat']?>"><?=$data['nama_obat']?></option>
                     <?php }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal Periksa</label>
                    <input type="date" name="tgl" class="form-control" value="<?=date('Y-m-d')?>" id="tgl" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" class="btn btn-success" value="Simpan">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'keluhan' );
            </script>
        </div>
    </div>


<?php include_once '../_footer.php';?>