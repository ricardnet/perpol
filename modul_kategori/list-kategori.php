<?php 
include('../template/header.php');
include('proses-list-kategori.php');
$no=1;
?>
<section id="main-content">
	<section class="wrapper site-min-auto">
		<div class="row mt">
			<div class="col-md-5">
				<div class="panel">
					<div class="panel-body minimal">
                    <h3 class="centered">DATA KATEGORI <a href="#addKategori" class="btn btn-sm btn-theme" type="button" data-toggle="modal"><i class="fa fa-plus"></i></a></h3><hr>
                    <?php
                        //cek messages ada atau tidak
                        if(!empty($_SESSION['messages'])){
                            echo $_SESSION['messages'];
                            unset($_SESSION['messages']);
                        }
                    ?>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th width="20%">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data_kategori as $kategori): ?>
                                <tr>
                                    <td width="5px"><?=$no++ ?>.</td>
                                    <td><?=$kategori['kategori_nama'];?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="#editKategori" data-toggle="modal" data-id="<?=$kategori['kategori_id'];?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs" href="delete-kategori.php?id_kategori=<?=$kategori['kategori_id'];?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Modal Tambah--> 
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addKategori" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title centered">TAMBAH DATA KATEGORI</h4>
                        </div>
                        <form action="proses-tambah-kategori.php" method="POST">
                        <div class="modal-body">
                            <input type="text" name="kategori" class="form-control">
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
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editKategori" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title centered">EDIT DATA KATEGORI</h4>
                        </div>
                        <div class="modal-body">
                            <div class="hasil-data"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Modal Edit-->
        </div>
    </section>
</section>
<?php include('../template/footer.php');?>
<!--Modal editKategori-->
<script>
    $(document).ready(function(){
        $('#editKategori').on('show.bs.modal', function (e){
            var idkategori = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk mengambil data
            $.ajax({
                type : 'post',
                url : 'edit-kategori.php',
                data : 'idkategori=' + idkategori,
                success : function(data){
                    $('.hasil-data').html(data);//menampilkan data dalam modal
                }
            });
        });
    });
</script>
