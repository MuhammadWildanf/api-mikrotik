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
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-saldo">
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
												<td> <span class="badge <?= $data->status == 'BELUM DIBAYAR' ? 'bg-danger' : ($data->status == 'LUNAS' ? 'bg-success' : 'bg-secondary') ?>">
														<?= $data->status; ?>
													</span></td>
												<td><?= $data->pembayaran; ?></td>
												<td> <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data->id ?>">
														<i class="fas fa-trash"></i>
													</a></td>
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

<div class="modal fade" id="modal-add-saldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fs-5" id="exampleModalLabel">Add <?= $title ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="addForm" action="<?= site_url('member/saldo/addsaldo'); ?>" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="nominal" class="form-label">Isi saldo Minimal Rp. 10.000</label>
						<input type="text" class="form-control" name="nominal" id="add_nominal" placeholder="nominal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on("click", ".delete-btn", function() {
		var id = $(this).data('id');
		var confirmation = confirm("Apakah Anda yakin ingin menghapus item ini?");

		if (confirmation) {
			// Lakukan aksi penghapusan
			$.ajax({
				type: "POST",
				url: "<?= site_url('member/saldo/delsaldo') ?>",
				data: {
					id: id
				},
				success: function(response) {
					// Refresh halaman atau perbarui tabel setelah penghapusan
					location.reload();
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
		}
	});
</script>