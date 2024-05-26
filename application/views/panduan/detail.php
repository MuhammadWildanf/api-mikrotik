<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <h3><?= $title ?></h3>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="Judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="Judul" id="Judul" value="<?= $panduan->judul ?>" placeholder="Judul" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="Keterangan" placeholder="Keterangan" readonly><?= $panduan->keterangan ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= site_url('panduan/index') ?>" class="btn btn-secondary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
