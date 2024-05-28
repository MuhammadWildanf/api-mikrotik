<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $title?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">

			<div class="row justify-content-center">
				<div class="col-12 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Saldo Anda</span>
							<span class="info-box-number">
								Rp <?= number_format($totalsaldo, 0, ',', '.') ?>
							</span>
						</div>

					</div>

				</div>


				<div class="clearfix hidden-md-up"></div>
				<div class="col-12 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total transaksi anda</span>
							<span class="info-box-number">760</span>
						</div>

					</div>

				</div>

				<div class="col-12 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Akun VPN anda </span>
							<span class="info-box-number"><?= $totalvpn?></span>
						</div>

					</div>

				</div>
				<div class="col-12 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Rule Forward </span>
							<span class="info-box-number"><?= $totalrule?></span>
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>

</div>