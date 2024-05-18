<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3><?= $title ?></h3>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-header">
                    <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-ppp">
                        <i class="fas fa-plus" style="color: blue;"></i> Add <?= $title ?>
                    </button> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1" width="100%" collspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama VPN</th>
                                            <th>Port Awal</th>
                                            <th>Port Foward</th>
                                            <th>Ip Vpn</th>
                                            <th>Ip Remote</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($port as $data) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-sm edit-btn" data-id="<?= $data->id ?>" data-nama_vpn="<?= $data->nama_vpn ?>" data-port_awal="<?= $data->port_awal ?>" data-port_to="<?= $data->port_to ?>" data-ip_vpn="<?= $data->ip_vpn ?>" data-ip_remote="<?= $data->ip_remote ?>" data-comment="<?= $data->comment ?>" data-status="<?= $data->status ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data->id ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-info btn-sm detail-btn" data-port_awal="<?= $data->port_awal ?>" data-ip_vpn="<?= $data->ip_vpn ?>" data-port_to="<?= $data->port_to ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td><?= $data->nama_vpn; ?></td>
                                                <td><?= $data->port_awal; ?></td>
                                                <td><?= $data->port_to; ?></td>
                                                <td><?= $data->ip_vpn; ?></td>
                                                <td><?= $data->ip_remote; ?></td>
                                                <td><?= $data->comment; ?></td>
                                                <td><span class="badge <?= ($data->status == 'Rule Sudah Terdaftar') ? 'bg-success' : (($data->status == 'Rule Sedang Pending') ? 'bg-warning' : 'bg-danger') ?>"><?= $data->status; ?></span></td>
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
    </div>

</div>

<!-- <div class="modal fade" id="modal-add-ppp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Add <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" action="<?= site_url('forwading/addport'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="vpn_id" class="form-label">Nama VPN</label>
                        <select class="form-select" name="vpn_id" id="vpn_id">
                            <option value="" selected>Pilih Akun VPN</option>
                            <?php foreach ($vpn as $data) { ?>
                                <option value="<?= $data->id; ?>" selected><?= $data->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="port_awal" class="form-label">Port Awal</label>
                        <select class="form-select" aria-label="Default select example" name="port_awal">
                            <option selected>Select Port</option>
                            <option value="21">21 - FTP</option>
                            <option value="22">22 - SSH</option>
                            <option value="23">23 - Telnet</option>
                            <option value="80">80 - WWW/WEBFIG</option>
                            <option value="443">443 - WWW/SSL</option>
                            <option value="3389">3389 - RDP</option>
                            <option value="8291">8291 - WINBOX</option>
                            <option value="8728">8728 - API</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="port_to" class="form-label">Port Foward Ke</label>
                        <input type="number" class="form-control" name="port_to" id="port_to" placeholder="Port Foward Ke">
                    </div>
                    <div class="mb-3">
                        <label for="ip_vpn" class="form-label">Ip VPN</label>
                        <input type="text" class="form-control" name="ip_vpn" id="ip_vpn" placeholder="Ip Vpn">
                    </div>
                    <div class="mb-3">
                        <label for="ip_remote" class="form-label">Ip Remote</label>
                        <input type="text" class="form-control" name="ip_remote" id="ip_remote" value="103.169.7.234:" placeholder="Ip Remote">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" placeholder="comment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Your HTML content -->
<div class="modal fade" id="modal-edit-ppp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="<?= site_url('forwading/updateport'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_nama_vpn" class="form-label">Nama VPN</label>
                        <input type="text" class="form-control" name="nama_vpn" id="edit_nama_vpn" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_port_awal" class="form-label">Port Awal</label>
                        <input type="number" class="form-control" name="port_awal" id="edit_port_awal" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_port_to" class="form-label">Port Forward Ke</label>
                        <input type="number" class="form-control" name="port_to" id="edit_port_to" placeholder="Port Forward Ke">
                    </div>
                    <div class="mb-3">
                        <label for="edit_ip_vpn" class="form-label">IP VPN</label>
                        <input type="text" class="form-control" name="ip_vpn" id="edit_ip_vpn" placeholder="IP VPN" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_ip_remote" class="form-label">IP Remote</label>
                        <input type="text" class="form-control" name="ip_remote" id="edit_ip_remote" placeholder="IP Remote">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="edit_comment" placeholder="Comment">
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="edit_status">
                            <option value="Rule Belum Terdaftar">Rule Belum Terdaftar</option>
                            <option value="Rule Sudah Terdaftar">Rule Sudah Terdaftar</option>
                            <option value="Rule Sedang Pending">Rule Sedang Pending</option>
                        </select>
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

<div class="modal fade" id="modal-detail-vpn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail VPN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success text-center"><strong>PEMBUATAN RULE FORWADING BERHASIL SILAHKAN </br> COPY PASTE SCRIPT DIBAWAH INI KE TERMINAL WINBOX</strong></p>
                <p><strong></strong> <span id="detail-sentence"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Your HTML content -->

<script>
    // $(document).ready(function() {
    //     $('#modal-add-ppp').on('show.bs.modal', function() {
    //         $.ajax({
    //             url: '<?= site_url('member/port/get_vpn_options'); ?>',
    //             method: 'GET',
    //             dataType: 'json',
    //             success: function(data) {
    //                 $('#vpn_id').empty();
    //                 $.each(data, function(index, item) {
    //                     $('#vpn_id').append($('<option>', {
    //                         value: item.id,
    //                         text: item.nama,
    //                         remoteaddress: item.remoteaddress 
    //                     }));
    //                 });
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error(xhr.responseText);
    //             }
    //         });
    //     });

    //     $('#vpn_id').on('change', function() {
    //         var selectedRemoteAddress = $(this).find('option:selected').attr('remoteaddress');
    //         $('#ip_vpn').val(selectedRemoteAddress);
    //     });
    // });
</script>

<script>
    // Ketika nilai pada bidang "Port Forward Ke" berubah
    $('#port_to').on('input', function() {
        // Ambil nilai yang dimasukkan oleh pengguna
        var portForwardValue = $(this).val();

        // Jika nilai tidak kosong
        if (portForwardValue !== '') {
            // Buat nilai "Ip Remote" dengan menambahkan nilai "portForwardValue:" ke akhir IP Remote tetap
            var ipRemoteValue = "103.169.7.234:" + portForwardValue;
            // Isi nilai "Ip Remote" dengan nilai yang baru dibuat
            $('#ip_remote').val(ipRemoteValue);
        }
    });

    $('#edit_port_to').on('input', function() {
        // Ambil nilai yang dimasukkan oleh pengguna
        var portForwardValue = $(this).val();

        // Jika nilai tidak kosong
        if (portForwardValue !== '') {
            // Buat nilai "Ip Remote" dengan menambahkan nilai "portForwardValue:" ke akhir IP Remote tetap
            var ipRemoteValue = "103.169.7.234:" + portForwardValue;
            // Isi nilai "Ip Remote" dengan nilai yang baru dibuat
            $('#edit_ip_remote').val(ipRemoteValue);
        }
    });
</script>

<script>
    $(document).on("click", ".edit-btn", function() {
        var id = $(this).data('id');
        var nama_vpn = $(this).data('nama_vpn');
        var port_awal = $(this).data('port_awal');
        var port_to = $(this).data('port_to');
        var ip_vpn = $(this).data('ip_vpn');
        var ip_remote = $(this).data('ip_remote');
        var comment = $(this).data('comment');
        var status = $(this).data('status');

        showModalEdit(id, nama_vpn, port_awal, port_to, ip_vpn, ip_remote, comment, status);
    });

    function showModalEdit(id, nama_vpn, port_awal, port_to, ip_vpn, ip_remote, comment, status) {
        $("#edit_id").val(id);
        $("#edit_nama_vpn").val(nama_vpn);
        $("#edit_port_awal").val(port_awal);
        $("#edit_port_to").val(port_to);
        $("#edit_ip_vpn").val(ip_vpn);
        $("#edit_ip_remote").val(ip_remote);
        $("#edit_comment").val(comment);
        $("#edit_status").val(status);

        $("#modal-edit-ppp").modal("show");
    }

    $(document).on("click", ".delete-btn", function() {
        var id = $(this).data('id');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus item ini?");

        if (confirmation) {
            // Lakukan aksi penghapusan
            $.ajax({
                type: "POST",
                url: "<?= site_url('forwading/delport') ?>",
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

    $(document).on("click", ".detail-btn", function() {
        var port_awal = $(this).data('port_awal');
        var port_to = $(this).data('port_to');
        var ip_vpn = $(this).data('ip_vpn');

        var sentence = '/ip firewall nat add chain=dstnat protocol=tcp dst-port=' + port_to + ' action=dst-nat to-address=' + ip_vpn + ' to-ports=' + port_awal;
        $("#detail-sentence").text(sentence);

        $("#modal-detail-vpn").modal("show");
    });
</script>

<script>
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>