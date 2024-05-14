<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Konfigurasi</a></li>
						<li class="breadcrumb-item active"><?= $title ?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-4 col-md-3">
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
			</div>
		</div>
	</section>


	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-ppp">
						<i class="fas fa-plus" style="color: blue;"></i> Add <?= $title ?>
					</button>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered" id="example1" width="100%" collspacing="0">
									<thead>
										<tr>
											<th>ID Transaksi</th>
											<th>Tanggal transaksi</th>
											<th>Nominal</th>
											<th>Status</th>
											<th>Pembayaran</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($saldo as $data) { ?>
											<tr>
												<td><?= $data->id; ?></td>
												<td><?= $data->tanggal; ?></td>
												<td><?= number_format($data->nominal, 0, ',', '.'); ?></td>
												<td><?= $data->status; ?></td>
												<td><?= $data->pembayaran; ?></td>
												<td>action</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>