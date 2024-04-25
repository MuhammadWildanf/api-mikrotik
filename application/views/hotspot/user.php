<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3>Hotspot User</h3>
            <div class="card">
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
                                        <?php foreach ($hotspotuser  as $data) {?>
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

<script>
  $(function () {
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