	<div class="content-wrapper mt-5">
		<div class="content-header">
			<div class="container-fluid">
				<!-- Info boxes -->
				<div class="row">
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box">
							<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">CPU Load</span>
								<span class="info-box-number">
									<?= $cpu ?>
									<small>%</small>
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">PPP Aktiv</span>
								<span class="info-box-number"><?= $pppactive ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->

					<!-- fix for small devices only -->
					<div class="clearfix hidden-md-up"></div>

					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">PPP</span>
								<span class="info-box-number"><?= $ppp ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
					<div class="col-12 col-sm-6 col-md-3">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Uptime</span>
								<span class="info-box-number"><?= $uptime ?></span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
		</div>

	</div>