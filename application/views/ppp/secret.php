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
                                                <td>
                                                    <a href="<?= site_url('ppp/delSecret'); ?>" onclick="return confirm('Apakah anda yakin ingin <?= $data['name'] ?>')"><i class="fas fa-trash" style="color: red;"></i></a>
                                                    <a href="<?= site_url('ppp/editSecret'); ?>"><i class="fas fa-edit" style="color: yellow;"></i></a>
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
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="service">Service</label>
                        <select class="form-select" id="service" name="service" aria-label="Default select example" required>
                            <option selected>Open this select menu</option>
                            <option value="pppoe">pppoe</option>
                            <option value="l2tp">l2tp</option>
                            <option value="ovpn">ovpn</option>
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