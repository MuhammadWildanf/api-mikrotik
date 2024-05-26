<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3><?= $title ?></h3>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <form id="editForm" action="<?= site_url('panduan/updatepanduan'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $panduan->id ?>">
                        <div class="mb-3">
                            <label for="editjudul" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="editjudul" value="<?= $panduan->judul ?>" placeholder="Judul">
                        </div>
                        <div class="mb-3">
                            <label for="editKeterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="editKeterangan" placeholder="Keterangan"><?= $panduan->keterangan ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= site_url('panduan/index') ?>" class="btn btn-secondary">Close</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="path_to_ckfinder/ckfinder.js"></script>
<script>
    CKEDITOR.replace('editKeterangan', {
        filebrowserBrowseUrl: 'path_to_ckfinder/ckfinder.html',
        filebrowserUploadUrl: '<?= site_url('upload/upload_image') ?>'
    });
</script>
