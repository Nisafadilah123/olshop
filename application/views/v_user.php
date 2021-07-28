<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Users</h3>

            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary"><i
                        class="fas fa-plus"></i> Add
                </button>
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
                        <th>Nama Admin</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <!-- <th>Level</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
					foreach ($user as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?>.</td>
                        <td class="text-center"><?= $value->nama_user ?></td>
                        <td class="text-center"><?= $value->username ?></td>
                        <td class="text-center"><?= $value->email ?></td>
                        <td class="text-center"><?= $value->password ?></td>
                        <!-- <td class="text-center"><?php
															if ($value->level_user == 1) {
																echo '<span class="badge bg-danger">Admin</span>';
															} else {
																echo '<span class="badge bg-success">User</span>';
															}
															?></td> -->
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#edit<?= $value->id_user ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete<?= $value->id_user ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
				echo form_open('user/add');
				?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" id="nama_user" placeholder="Masukkan Nama Admin"
                        name="nama_user" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username"
                        name="username" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email Admin" name="email"
                        required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password Admin"
                        name="password" required>
                </div>

                <!-- <div class="form-group">
                    <label>Level User</label>
                    <select name="level_user" class="form-control">
                        <option value="1" selected>Admin</option>
                        <option value="2" selected>User</option>
                    </select>
                </div> -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php
			echo form_close();
			?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit-->
<?php
foreach ($user as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_user ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
					echo form_open('user/edit/' . $value->id_user);
					?>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" id="nama_user" placeholder="Enter Name" name="nama_user"
                        required value="<?= $value->nama_user ?>">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username"
                        required value="<?= $value->username ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required
                        value="<?= $value->email ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password"
                        name="password" required value="<?= $value->password ?>">
                </div>

                <!-- <div class="form-group">
                    <label>Level User</label>
                    <select name="level_user" class="form-control">
                        <option value="1" <?php if ($value->level_user == 1) {
												echo 'selected';
											}
											?>>Admin</option>
                        <option value="2" <?php if ($value->level_user == 2) {
												echo 'selected';
											}
											?>>User</option>
                    </select>
                </div> -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php
				echo form_close();
				?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php } ?>

<!-- Modal Delete-->
<?php
foreach ($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_user ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Admin <?= $value->nama_user ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda ingin menghapus data ini ?</h5>




          
  </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-primary">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php } ?>