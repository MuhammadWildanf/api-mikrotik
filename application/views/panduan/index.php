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
                    <a href="<?= site_url('panduan/add') ?>" class="btn btn-secondary">
                        <i class="fas fa-plus" style="color: blue;"></i> Add <?= $title ?>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1" width="100%" collspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Judul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($panduan as $data) { ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= site_url('panduan/edit/' . $data->id) ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= site_url('panduan/detail/' . $data->id) ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= $data->id ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td><?= $data->judul; ?></td>
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
            <form id="addForm" action="<?= site_url('panduan/addpanduan'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addjudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="addjudul" placeholder="Judul">
                    </div>
                    <div class="mb-3">
                        <label for="addKeterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="Keterangan" id="addKeterangan" placeholder="Keterangan"></textarea>
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
            <form id="editForm" action="<?= site_url('panduan/updatepanduan'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="mb-3">
                        <label for="editjudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="edit_judul" placeholder="Judul">
                    </div>
                    <div class="mb-3">
                        <label for="edit_Keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="Keterangan" id="edit_Keterangan" placeholder="Keterangan"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Panduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="Judul" id="Judul" placeholder="Judul">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Your HTML content -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('addKeterangan');
    CKEDITOR.replace('edit_Keterangan');

    $(document).on("click", ".edit-btn", function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var keterangan = $(this).data('keterangan');
        // Panggil Ajax untuk mendapatkan data VPN
    });

    function showModalEdit(id, judul, keterangan) {
        $("#edit_id").val(id);
        $("#edit_judul").val(judul);
        CKEDITOR.instances['edit_Keterangan'].setData(keterangan);

        $("#modal-edit-ppp").modal("show");
    }

    $(document).on("click", ".delete-btn", function() {
        var id = $(this).data('id');
        var confirmation = confirm("Apakah Anda yakin ingin menghapus item ini?");

        if (confirmation) {
            // Lakukan aksi penghapusan
            $.ajax({
                type: "POST",
                url: "<?= site_url('panduan/delpanduan') ?>",
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
        var judul = $(this).data('judul');
        var keterangan = $(this).data('keterangan');

        $("#detailJudul").val(judul);
        $("#detailKeterangan").val(keterangan);

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