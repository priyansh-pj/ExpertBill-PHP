<div class="container-fluid py-4">
    <?php if (!empty($organizations)) : ?>
        <?php foreach ($organizations as $organization) : ?>
            <?php $count = 0 ?>
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= $organization->name ?></h4>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
                <?php if ($count % 3 == 0) : ?>
            </div>
            <div class="row">
            <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>