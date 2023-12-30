<?php 
include('../template/header.php');
?>
<section id="main-content">
	<section class="wrapper site-main-auto">
		<div class="row mt">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-body minimal">
						<h2 class="centered">DATA KATEGORI <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#addKategori"><i class="fa fa-plus"></i></button></h2><hr>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama Kategori</th>	
									<th>Pilihan</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include('../config.php');
							$no=1;
							$query = "SELECT * FROM kategori";
							$result = mysqli_query($db,$query);
							while($row = mysqli_fetch_array($result)){
							?>
								<tr>
									<td><?=$no++;?></td>
									<td><?=$row['kategori_nama']?></td>
									<td><a href="#edit_modal" class="btn btn-theme btn-xs" data-toggle="modal" data-id="<?=$row['kategori_id']?>">EDIT</a></td>
									<?php echo "<td><a href='#edit_modal' class='btn btn-theme btn-xs' data-toggle='modal' data-id=".$row['kategori_id']."><i class='fa fa-pencil'></i></a></td>";?>
								</tr>
							<?php }?>
							</tbody>
						</table>

						<!--myPinjam tambah-->
						<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addKategori" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title centered">Tambah Kategori</h4>
									</div>
									<form action="tambah-kategori.php" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kategori">
											<label id="lblName" style="color:red"></label>
										</div>
									</div>
									<div class="modal-footer">
										<button data-dismiss="modal" class="btn btn-default" type="button">Kembali</button>
										<button class="btn btn-theme" id="save" type="submit">Simpan</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!--End myPinjam tambah-->
						<!--myEdit-->
						<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit_modal" class="modal fade">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title centered">Edit Kategori</h4>
									</div>
									<div class="modal-body">
										<div class="hasil-data"></div>
									</div>
								</div>
							</div>
						</div>
						<!--End myEdit-->
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<?php include('../template/footer.php'); ?>
<!--Tambah Data-->
<script>
	$(document).ready(function(){
		$(document).on('click','#save',function(){
			var nama = $("#nama").Val();
				$.ajax({
					url:"tambah-kategori.php",
					type: "post",
					data: {nama:nama},
					success:function(data){
					alert("Data berhasil disimpan");
					$("#addKategori").modal('hide');
					location.reload();
					}
				});		
		});
	});
</script>
<!--Edit Data--->
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'data.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
