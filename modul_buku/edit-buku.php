<?php
include('../config.php');
include('../modul_kategori/proses-list-kategori.php');
$id = $_POST['idbuku'];
$query = mysqli_query($db,"SELECT * FROM buku WHERE buku_id=$id");
while($buku = mysqli_fetch_array($query)){
?>
        <form action="proses-edit-buku.php" method="post">
        <div class="form-group">
        <input type="hidden" name="id_buku" value="<?=$buku['buku_id']?>">
            <p>Kode Buku</p>
            <input type="text" name="kode" class="form-control" value="<?=$buku['buku_kode'];?>">
        </div>
        <div class="form-group">
            <p>Judul Buku</p>
            <input type="text" name="judul" class="form-control" value="<?=$buku['buku_judul'];?>">
        </div>
        <div class="form-group">
            <p>Kategori</p>
            <select name="kategori" class="form-control">
                <?php foreach($data_kategori as $kategori):?>
                <option value="<?=$kategori['kategori_id'];?>"><?=$kategori['kategori_nama'];?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <p>Penulis Buku</p>
            <input type="text" name="pengarang" class="form-control" value="<?=$buku['buku_pengarang'];?>">
        </div>
        <div class="form-group">
            <p>Penerbit</p>
            <input type="text" name="penerbit" class="form-control" value="<?=$buku['buku_penerbit'];?>">
        </div>
        <div class="form-group">
            <p>Tahun Terbit</p>
            <input type="number" name="tahun" class="form-control" value="<?=$buku['buku_tahun'];?>">
        </div>
        <div class="form-group">
            <p>Jumlah</p>
            <input type="number" name="jumlah" class="form-control" value="<?=$buku['jumlah'];?>">
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
            <button class="btn btn-theme" type="submit">Simpan</button>
        <div>
        </form>
<?php }?>