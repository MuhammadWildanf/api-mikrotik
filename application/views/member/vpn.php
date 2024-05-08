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
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Local Address</th>
                                            <th>Remote Address</th>
                                            <th>comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vpn as $data) { ?>
                                            <tr>
                                                <td>
                                                    <a href="#" class="btn btn-warning btn-sm edit-btn" data-id="<?= $data->id ?>" data-nama="<?= $data->nama ?>" data-user="<?= $data->user ?>" data-password="<?= $data->password ?>" data-localaddress="<?= $data->localaddress ?>" data-remoteaddress="<?= $data->remoteaddress ?>" data-comment="<?= $data->comment ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data->id ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-info btn-sm detail-btn" data-nama="<?= $data->nama ?>" data-password="<?= $data->password ?>" data-user="<?= $data->user ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td><?= $data->nama; ?></td>
                                                <td><?= $data->user; ?></td>
                                                <td><?= $data->password; ?></td>
                                                <td><?= $data->localaddress; ?></td>
                                                <td><?= $data->remoteaddress; ?></td>
                                                <td><?= $data->comment; ?></td>
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

<div class="modal fade" id="modal-add-ppp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Add <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" action="<?= site_url('member/vpn/addvpn'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="nama">
                    </div>
                    <div class="mb-3">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" class="form-control" name="user" placeholder="user">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" name="password" placeholder="password">
                    </div>
                    <div class="mb-3">
                        <label for="localaddress" class="form-label">Local Address</label>
                        <input type="text" class="form-control" name="localaddress" value="192.168.41.1" placeholder="localaddress" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="remoteaddress" class="form-label">Remote Address</label>
                        <input type="text" class="form-control" name="remoteaddress" placeholder="remoteaddress">
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
</div>

<!-- Your HTML content -->
<div class="modal fade" id="modal-edit-ppp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="<?= site_url('member/vpn/updatevpn'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Username</label>
                        <input type="text" class="form-control" name="user" id="edit_user" placeholder="User">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="edit_password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="localaddress" class="form-label">Local Address</label>
                        <input type="text" class="form-control" name="localaddress" id="edit_localaddress" placeholder="Local Address">
                    </div>
                    <div class="mb-3">
                        <label for="remoteaddress" class="form-label">Remote Address</label>
                        <input type="text" class="form-control" name="remoteaddress" id="edit_remoteaddress" placeholder="Remote Address">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="edit_comment" placeholder="Comment">
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
                <p class="text-success text-center"><strong>PEMBUATAN AKUN BERHASIL SILAHKAN </br> COPY PASTE SCRIPT DIBAWAH INI KE TERMINAL WINBOX</strong></p>
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
    $(document).on("click", ".edit-btn", function() {
        var nama = $(this).data('nama');
        var user = $(this).data('user');
        var password = $(this).data('password');
        var id = $(this).data('id');
        var localaddress = $(this).data('localaddress');
        var remoteaddress = $(this).data('remoteaddress');
        var comment = $(this).data('comment');

        $("#edit_id").val(id);
        $("#edit_nama").val(nama);
        $("#edit_user").val(user);
        $("#edit_password").val(password);
        $("#edit_localaddress").val(localaddress);
        $("#edit_remoteaddress").val(remoteaddress);
        $("#edit_comment").val(comment);

        $("#modal-edit-ppp").modal("show");
    });

    $(document).on("click", ".delete-btn", function() {
        var id = $(this).data('id');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus item ini?");

        if (confirmation) {
            // Lakukan aksi penghapusan
            $.ajax({
                type: "POST",
                url: "<?= site_url('member/vpn/delvpn') ?>",
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
        var nama = $(this).data('nama');
        var user = $(this).data('user');
        var password = $(this).data('password');

        $("#detail-nama").text(nama);
        $("#detail-user").text(user);
        $("#detail-password").text(password);

        $("#modal-detail-vpn").modal("show");

        var sentence = '/interface l2tp-client add connect-to=103.169.7.234 name=' + nama + ' password="' + password + '" user="' + user + '" disable=no';
        $("#detail-sentence").text(sentence);
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