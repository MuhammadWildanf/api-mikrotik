<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3>Hotspot User</h3>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                        Add User
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1" width="100%" collspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?= $totalhotspotuser ?></th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Profile</th>
                                            <th>Uptime</th>
                                            <th>Bytes Inc</th>
                                            <th>Bytes Out</th>
                                            <th>comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hotspotuser  as $data) { ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $data['name']; ?></td>
                                                <td><?= $data['password']; ?></td>
                                                <td><?= $data['profile']; ?></td>
                                                <td><?= $data['uptime']; ?></td>
                                                <td><?= $data['bytes-in']; ?></td>
                                                <td><?= $data['bytes-out']; ?></td>
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

<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Add User Hotspot</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('hotspot/addUser'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user">Name</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Enter User">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="server">Server</label>
                        <select type="text" class="form-control" name="server" id="server" placeholder="Server">
                            <?php foreach ($server as $data) { ?>
                                <option value=""><?= $data['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select type="text" class="form-control" name="profile" id="profile" placeholder="profile">
                            <?php foreach ($profile as $data) { ?>
                                <option value=""><?= $data['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="timelimit">Time Limit</label>
                        <input type="text" class="form-control" name="timelimit" id="timelimit" placeholder="timelimit">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="comment">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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