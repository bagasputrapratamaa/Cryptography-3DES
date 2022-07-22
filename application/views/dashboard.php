<section class="content-header">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?= $this->db->query('SELECT * FROM users')->num_rows(); ?></h3>
						<b>
							<p>Total Pengguna</p>
						</b>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>3<sup style="font-size: 20px"></sup></h3>
						<b>
							<p>Total Enkripsi</p>
						</b>
					</div>
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>3</h3>
						<b>
							<p>Total Deskripsi</p>
						</b>
					</div>
					<div class="icon">
						<i class="fa fa-copy"></i>
					</div>
				</div>
			</div>
</section>