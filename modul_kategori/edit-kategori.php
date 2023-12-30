<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../login.php');
    exit;
}
include('../config.php');
$id = $_POST['idkategori'];
$sql = mysqli_query($db,"SELECT * FROM kategori WHERE kategori_id=$id");
while($result = mysqli_fetch_array($sql)){
?>   
    <form action="proses-edit-kategori.php" method="POST">
        <input type="hidden" name="id_kategori" value="<?=$result['kategori_id'];?>">
        <div class="form-group">
            <input type="text" name="nama_kategori" class="form-control" value="<?=$result['kategori_nama'];?>">
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
            <button class="btn btn-theme"  type="submit">Simpan</button>
        </div>
    </form>
<?php }?>