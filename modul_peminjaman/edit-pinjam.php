<?php
include('../config.php');
include('../modul_buku/proses-list-buku.php');
$id = $_POST['idpinjam'];
$query = mysqli_query($db,"SELECT * FROM pinjam WHERE pinjam_id = $id");
while($result = mysqli_fetch_array($query)){

?>
                <form action="proses-edit-pinjam.php" method="POST">
                    <input type="hidden" name="pinjam_id" value="<?=$result['pinjam_id'];?>">
                    <div class="modal-body">
                        <p>Judul Buku</p>
                        <select name="buku" class="form-control">
                            <?php foreach($data_buku as $buku): ?>
                            <option value="<?=$buku['buku_id'];?>"><?=$buku['buku_judul'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="modal-body">
                        <p>Nama</p>
                        <input type="text" name="nama" class="form-control" value="<?=$result['pinjam_nama'];?>">
                    </div>
                    <div class="modal-body">
                        <p>NIM</p>
                        <input type="text" name="nim" class="form-control" value="<?=$result['pinjam_nim'];?>">
                    </div>
                    <div class="modal-body">
                        <p>Tgl Pinjam</p>
                        <input type="date" name="tgl_pinjam" class="form-control" value="<?=$result['tgl_pinjam'];?>">
                    </div>
                    <div class="modal-body">
                        <p>Tgl Jatuh Tempo</p>
                        <input type="date" name="tgl_jatuh_tempo" class="form-control" value="<?=$result['tgl_jatuh_tempo'];?>">
                        
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                        <button class="btn btn-theme" type="submit">Simpan</button>
                    </div>
                </form>
<?php }?>