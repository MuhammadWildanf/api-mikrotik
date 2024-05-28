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
					<form id="payment-form" action="<?= site_url() ?>/member/saldo/finish" method="post">
						<div class="card-body">
							<div class="row align-items-center">
								<input type="hidden" name="result_type" id="result-type" value="">
								<input type="hidden" name="result_data" id="result-data" value="">
								<div class="col">
									<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal Topup" required>
								</div>
								<div class="col">
									<button type="button" id="pay-button" class="btn btn-secondary">
										<i class="fas fa-plus" style="color: blue;"></i> Add <?= $title ?>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered" id="example1" width="100%" collspacing="0">
									<thead>
										<tr>
											<th>ID Transaksi</th>
											<th>Nominal</th>
											<th>Payment Type</th>
											<th>Bank</th>
											<th>Va Number</th>
											<th>Transaction Time</th>
											<th>Status</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($midtrans as $data) { ?>
											<tr>
												<td><?= $data->order_id; ?></td>
												<td><?= number_format($data->gross_amount, 0, ',', '.'); ?></td>
												<td><?= $data->payment_type; ?></td>
												<td><?= $data->bank; ?></td>
												<td><?= $data->va_number; ?></td>
												<td><?= $data->transaction_time; ?></td>
												<td>
													<?php
													if ($data->status_code == "200") {
														echo '<span class="badge bg-success">Success</span>';
													} else {
														echo '<span class="badge bg-warning">Pending</span>';
													}
													?>
												</td>
												<td><a href="<?= $data->pdf_url; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">Cara Pembayaran</a></td>
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
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-eb2QJIH_yqjtsGRW"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
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


	$('#pay-button').click(function(event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");
		var nominal = $('#nominal').val();

		if (nominal === '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Mohon masukkan nominal topup.',
			});
			$(this).removeAttr("disabled");
			return;
		}

		$.ajax({
			type: 'POST',
			url: '<?= site_url() ?>/member/saldo/token',
			data: {
				nominal: nominal
			},
			cache: false,

			success: function(data) {
				//location = data;

				console.log('token = ' + data);

				var resultType = document.getElementById('result-type');
				var resultData = document.getElementById('result-data');

				function changeResult(type, data) {
					$("#result-type").val(type);
					$("#result-data").val(JSON.stringify(data));
					//resultType.innerHTML = type;
					//resultData.innerHTML = JSON.stringify(data);
				}

				snap.pay(data, {

					onSuccess: function(result) {
						changeResult('success', result);
						console.log(result.status_message);
						console.log(result);
						$("#payment-form").submit();
					},
					onPending: function(result) {
						changeResult('pending', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					},
					onError: function(result) {
						changeResult('error', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					}
				});
			}
		});
	});
</script>