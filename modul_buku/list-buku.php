<?php 
include('../template/header.php');
include('proses-list-buku.php');
include('../modul_kategori/proses-list-kategori.php');
$no=1;
?>
<section id="main-content">
    <section class="wrapper site-min-auto">
        <div class="row mt">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body minimal">
                    <h3 class="centered">DATA BUKU <a href="#addBuku" class="btn btn-sm btn-theme" type="button" data-toggle="modal"><i class="fa fa-plus"></i></a></h3><hr>
                    <?php
                    if(!empty($_SESSION['messages'])){
                        echo $_SESSION['messages'];
                        unset($_SESSION['messages']);
                    }
                    ?>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Judul Buku</th>
                                    <th>Kategori</th>
                                    <th width="20%">Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                    <th>Jumlah</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data_buku as $buku) :?>
                                <tr>
                                    <td><?=$no++;?>.</td>
                                    <td><?=$buku['buku_kode'];?></td>
                                    <td><?=$buku['buku_judul'];?></td>
                                    <td><?=$buku['kategori_nama'];?></td>
                                    <td><?=$buku['buku_pengarang'];?></td>
                                    <td><?=$buku['buku_penerbit'];?></td>
                                    <td><?=$buku['buku_tahun'];?></td>
                                    <td><?=$buku['jumlah'];?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="#editBuku" data-toggle="modal" data-id="<?=$buku['buku_id'];?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs" href="delete-buku.php?id_buku=<?=$buku['buku_id'];?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Modal tambah-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addBuku" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title centered">TAMBAH DATA BUKU</h4>
                            </div>
                            <form action="proses-tambah-buku.php" method="POST">
                            <div class="modal-body">
                                <p>Kode Buku</p>
                                <input type="text" name="kode" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Judul Buku</p>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Kategori</p>
                                <select name="kategori" class="form-control">
                                    <?php foreach($data_kategori as $kategori):?>
                                    <option value="<?=$kategori['kategori_id'];?>"><?=$kategori['kategori_nama'];?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="modal-body">
                                <p>Penulis Buku</p>
                                <input type="text" name="pengarang" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Penerbit</p>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Tahun Terbit</p>
                                <input type="number" name="tahun" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Jumlah</p>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                                <button class="btn btn-theme" type="submit">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Modal Tambah-->
                <!--Modal Edit--> 
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editBuku" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title centered">EDIT DATA BUKU</h4>
                            </div>
                            <div class="modal-body">
                                <div class="hasil-data"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Edit-->
            </div>
        </div>
    </section>
</section>
<?php include('../template/footer.php')?>
<!--Modal editKategori-->
<script>
    $(document).ready(function(){
        $('#editBuku').on('show.bs.modal', function (e){
            var idbuku = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk mengambil data
            $.ajax({
                type : 'post',
                url : 'edit-buku.php',
                data : 'idbuku=' + idbuku,
                success : function(data){
                    $('.hasil-data').html(data);//menampilkan data dalam modal
                }
            });
        });
    });
</script>
