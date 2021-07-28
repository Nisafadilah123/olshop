<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>

            <div class="card-tools">
                <!-- <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary"><i
                        class="fas fa-plus"></i> Add
                </button> -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
			if (
				$this->session->flashdata('pesan')
			) {
				echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Sukses</h5>';
				echo
				$this->session->flashdata('pesan');
				echo '</div>';
			}

			?>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
					foreach ($pelanggan as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?>.</td>
                        <td class="text-center"><?= $value->nama_pelanggan ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->email ?></td>
                        <td><?= $value->password ?></td>
                        <td><img src="<?= base_url('assets/pelanggan/' . $value->foto) ?>" width="100px"></td>
                        <td class="text-center">

                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete<?= $value->id_pelanggan ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- Modal Delete-->
<?php
foreach ($pelanggan as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_pelanggan ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Pelanggan <?= $value->nama_pelanggan ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda ingin menghapus data ini ?</h5>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('pelanggan/delete/' . $value->id_pelanggan) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php } ?>





















































































<!-- /.modal -->