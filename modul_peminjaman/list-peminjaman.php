<?php  
include('../template/header.php');
include('../modul_peminjaman/proses-list-peminjaman.php');
include('../modul_buku/proses-list-buku.php');
$no=1;
?>

<section id="main-content">
    <section class="wrapper site-min-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body minimal">
                        <h3 class="centered">DATA PEMINJAMAN <a href="#addPinjam" class="btn btn-theme" data-toggle="modal"><i class="fa fa-plus"></i></a> </h3><hr>
                        <?php 
                        //cek messages ada atau tidak
                        if(!empty($_SESSION['messages'])){
                            echo $_SESSION['messages'];//menampilkan pesan
                            unset($_SESSION['messages']);//menghapus pesan setelah direfresh
                        }
                        ?>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Kode</th>
                                    <th widt="30%">Buku</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_pinjam as $pinjam):?>
                                <tr>
                                    <td><?=$no++;?>.</td>
                                    <td><?=$pinjam['buku_kode'];?></td>
                                    <td><?=$pinjam['buku_judul'];?></td>
                                    <td><?=$pinjam['pinjam_nama'];?></td>
                                    <td><?=$pinjam['pinjam_nim'];?></td>
                                    <td><?= date('d-m-Y',strtotime($pinjam['tgl_pinjam']));?></td>
                                    <td><?= date('d-m-Y',strtotime($pinjam['tgl_jatuh_tempo']));?></td>
                                    <td>
                                        <?php $status = ''?>
                                        <?php if(empty($pinjam['tgl-kembali'])):?>
                                            Pinjam
                                        <?php $status = 'pinjam'?>
                                        <?php else:?>
                                            Kembali
                                        <?php $status = 'kembali'?>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <!--<a href="list-peminjaman.php?<?//=$pinjam['pinjam_id'];?>#myPengembalian" class="btn btn-success btn-xs" title="Klik untuk proses pengembalian" data-toggle="modal"><i class="fa fa-reply"></i></a>-->
                                        <a href="proses-delete-pinjam.php?id_pinjam=<?=$pinjam['pinjam_id'];?>&&status=<?=$status;?>&&buku_id=<?=$pinjam['buku_id'];?>" class="btn btn-success btn-xs" title="Klik untuk proses pengembalian"><i class="fa  fa-reply"></i> Kembali</a>
                                        <!--<a href="#editPinjam" class="btn btn-primary btn-xs" data-toggle="modal" data-id="<?=$pinjam['pinjam_id'];?>"><i class="fa fa-pencil" title="Edit"></i></a>-->
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Modal Pinjam Tambah-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addPinjam" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title centered">PEMINJAMAN BUKU</h4>
                            </div>
                            <form action="proses-tambah-pinjam.php" method="POST">
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
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>NIM</p>
                                <input type="text" name="nim" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Tgl Pinjam</p>
                                <input type="date" name="tgl_pinjam" class="form-control">
                            </div>
                            <div class="modal-body">
                                <p>Tgl Jatuh Tempo</p>
                                <input type="date" name="tgl_jatuh_tempo" class="form-control">
                                
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
                                <button class="btn btn-theme" type="submit">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Pinjam Tambah-->
                <!--Modal Edit-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editPinjam" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title centered">EDIT PEMINJAMAN BUKU</h4>
                            </div>
                            <div class="modal-body">
                                <div class="hasil-data-edit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal Pinjam Edit-->
                <!--Modal Pengembalian-->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myPengembalian" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title centered">PENGEMBALIAN BUKU</h4>
                            </div>
                            <div class="modal-body">
                                <div class="hasil-data-kembali"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Pengembalian-->
            </div>
        </div>
    </section>
</section>

<?php include('../template/footer.php') ;?>
<script>
    $(document).ready(function(){
        $('#editPinjam').on('show.bs.modal', function(e){
            var idpinjam = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'edit-pinjam.php',
                data: 'idpinjam='+idpinjam,
                success : function(data){
                    $('.hasil-data-edit').html(data);
                }
            });
        });
        
    });
</script>
