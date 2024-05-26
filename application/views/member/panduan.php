<div class="content-wrapper mt-5">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($panduan)) : ?>
                        <div id="accordion">
                            <?php foreach ($panduan as $index => $p) : ?>
                                <div class="card mb-3">
                                    <div class="card-header" id="heading<?= $index ?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="true" aria-controls="collapse<?= $index ?>">
                                                <?= $p->judul ?>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse<?= $index ?>" class="collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $index ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <?= $p->keterangan ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p>Tidak Ada Panduan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>