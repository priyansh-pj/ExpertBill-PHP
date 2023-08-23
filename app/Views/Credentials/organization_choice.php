<?php if (!empty($organizations)) : ?>
    <div class="row">
        <?php foreach ($organizations as $organization) : ?>
            <?php $count = 0 ?>
            <a href="<?= base_url('Organization/verify/' . $organization->id) ?>">
                <div class="col-md-4 grid-margin stretch-card" style="margin-bottom:1.3rem">
                    <div class="card">
                        <div class="card-body" style="padding:1.7rem;">
                            <div class="clearfix">
                                <h3 class="page-title">
                                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                                        <i class="mdi mdi-bookmark-check"></i>
                                    </span> <?= $organization->name ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
            </a>
            <?php $count++; ?>
            <?php if ($count % 3 == 0) : ?>
    </div>
    <div class="row">
    <?php endif; ?>
<?php endforeach; ?>
<a href="<?= base_url('Organization/make') ?>">
    <div class="col-md-4 grid-margin stretch-card" style="margin-bottom:1.3rem">
        <div class="card">
            <div class="card-body" style="padding:1.7rem;">
                <div class="clearfix">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-library-plus"></i>
                        </span> Create Organization
                    </h3>
                </div>
            </div>
        </div>
    </div>
</a>

    </div>
<?php endif; ?>