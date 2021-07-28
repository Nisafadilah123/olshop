<div class="col-md-6">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Laporan Harian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open('laporan/lap_harian') ?>

            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tanggal</label>
                        <select name="tanggal" class="form-control">
                            <?php $start = 1;
							// perulangan sampai i = 31 (tgl)

							for ($i = $start; $i < $start + 31; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                            <?php $start = 1;
							// perulangan sampai i = 12 (bulan)
							for ($i = $start; $i < $start + 12; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" class="form-control">
                            <?php $start = date('Y');
							// perulangan sampai i = 10 (thn)

							for ($i = $start; $i < $start + 10; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Report</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>

        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Laporan Bulanan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php echo form_open('laporan/lap_bulanan') ?>

            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                            <?php $start = 1;
							for ($i = $start; $i < $start + 12; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" class="form-control">
                            <?php $start = date('Y');
							for ($i = $start; $i < $start + 10; $i++) {
								echo '<option value="' . $i . '">' . $i . '</option>';
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Report</button>
                    </div>
                </div>

            </div>
            <?php form_close(); ?>
        </div>
    </div>
</div>
