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
                                            <th><?= $totalsecret ?></th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Service</th>
                                            <th>Profile</th>
                                            <th>Local Address</th>
                                            <th>Remote Address</th>
                                            <th>comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($secret  as $data) { ?>
                                            <tr>
                                                <?php $id = str_replace('*', '', $data['.id']) ?>
                                                <td>
                                                    <a href="<?= site_url('ppp/delsecret/' . $id); ?>" onclick="return confirm('Apakah anda yakin ingin <?= $data['name'] ?>')"><i class="fas fa-trash" style="color: red;"></i></a>
                                                    <a href="#" id="edit" data-name=<?= $data['name'] ?> data-password=<?= $data['password'] ?> data-id=<?= $data['.id'] ?> data-service=<?= $data['service'] ?> data-profile=<?= $data['profile'] ?> data-comment=<?= $data['comment'] ?> data-localaddress=<?= $data['local-address'] ?> data-remoteaddress=<?= $data['remote-address'] ?> data-toggle="modal" data-target="#modal-edit" title="Edit"><i class="fas fa-edit" style="color: yellow;"></i></a>
                                                </td>
                                                <td><?= $data['name']; ?></td>
                                                <td><?= $data['password']; ?></td>
                                                <td><?= $data['service']; ?></td>
                                                <td><?= $data['profile']; ?></td>
                                                <td><?= $data['local-address']; ?></td>
                                                <td><?= $data['remote-address']; ?></td>
                                                <td><?= $data['comment']; ?></td>
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


<!-- Modal -->
<div class="modal fade" id="modal-add-ppp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Add <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addForm" action="<?= site_url('ppp/addsecret'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="vpn" class="form-label">Akun VPN</label>
                        <select class="form-control" name="vpn" id="vpn" required>
                            <option value="">Pilih Akun VPN</option>
                            <?php foreach ($vpn_list as $vpn) { ?>
                                <option value="<?= $vpn['id']; ?>"><?= $vpn['vpn_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="add_name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" name="password" id="add_password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="service">Service</label>
                        <select class="form-select" name="service" aria-label="Default select example" required>
                            <option value="l2tp">l2tp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select class="form-select" name="profile" aria-label="Default select example">
                            <?php foreach ($profile as $data) { ?>
                                <option value="<?= $data['name']; ?>"><?= $data['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="localaddress" class="form-label">Local Address</label>
                        <input type="text" class="form-control" name="localaddress" id="add_localaddress" placeholder="localaddress">
                    </div>
                    <div class="mb-3">
                        <label for="remoteaddress" class="form-label">Remote Address</label>
                        <input type="text" class="form-control" name="remoteaddress" id="add_remoteaddress" placeholder="remoteaddress">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="add_comment" placeholder="comment">
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
    $(document).ready(function() {
        $('#modal-add-ppp').on('show.bs.modal', function() {
            // Panggil Ajax untuk mendapatkan data VPN
            $.ajax({
                url: '<?= site_url('ppp/getVpnList'); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Bersihkan opsi sebelum menambahkan yang baru
                    $('#vpn').empty();
                    // Tambahkan opsi VPN dari data yang diterima
                    $.each(data, function(index, item) {
                        $('#vpn').append($('<option>', {
                            value: item.id,
                            text: item.nama,
                            user: item.user, 
                            password: item.password, 
                            localaddress: item.localaddress ,
                            remoteaddress: item.remoteaddress ,
                            comment: item.comment ,
                        }));
                    });

                    // Set opsi pertama sebagai terpilih secara otomatis
                    $('#vpn option:first').prop('selected', true).change();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Tambahkan event listener untuk perubahan dropdown "Akun VPN"
        $('#vpn').on('change', function() {
            // Ambil nilai user dan password dari opsi yang dipilih
            var selectedUser = $(this).find('option:selected').attr('user');
            var selectedPassword = $(this).find('option:selected').attr('password');
            var selectedlocaladdress = $(this).find('option:selected').attr('localaddress');
            var selectedremoteaddress = $(this).find('option:selected').attr('remoteaddress');
            var selectedcomment = $(this).find('option:selected').attr('comment');
            // Isi nilai user dan password ke kolom "name" dan "password"
            $('#add_name').val(selectedUser);
            $('#add_password').val(selectedPassword);
            $('#add_localaddress').val(selectedlocaladdress);
            $('#add_remoteaddress').val(selectedremoteaddress);
            $('#add_comment').val(selectedcomment);
        });
    });
</script>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Edit <?= $title ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="<?= site_url('ppp/editsecret'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="service">Service</label>
                        <select class="form-select" id="service" name="service" aria-label="Default select example" required>
                            <option value="l2tp">l2tp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select class="form-select" name="profile" id="profile" aria-label="Default select example">
                            <?php foreach ($profile as $data) { ?>
                                <option value="<?= $data['name']; ?>"><?= $data['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="localaddress" class="form-label">Local Address</label>
                        <input type="text" class="form-control" name="localaddress" id="localaddress" placeholder="localaddress">
                    </div>
                    <div class="mb-3">
                        <label for="remoteaddress" class="form-label">Remote Address</label>
                        <input type="text" class="form-control" name="remoteaddress" id="remoteaddress" placeholder="remoteaddress">
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="comment">
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
    $(document).on('click', '#edit', function() {
        $('#id').val($(this).data('id'))
        $('#name').val($(this).data('name'))
        $('#password').val($(this).data('password'))
        $('#service').val($(this).data('service'))
        $('#profile').val($(this).data('profile'))
        $('#localaddress').val($(this).data('localaddress'))
        $('#remoteaddress').val($(this).data('remoteaddress'))
        $('#comment').val($(this).data('comment'))
    })
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