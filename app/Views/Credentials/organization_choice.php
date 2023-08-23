<?php if (!empty($organizations)): ?>
    <div class="row">
        <?php foreach ($organizations as $organization): ?>
            <?php $count = 0 ?>

            <div class="col-md-4 grid-margin stretch-card" style="margin-bottom: 1.3rem;">
                <div class="card">
                    <div class="card-body" style="padding: 1.7rem;">
                        <div class="clearfix">
                            <a href="<?= base_url('Organization/verify/' . $organization->id) ?>"
                                style="text-decoration: none; color: inherit; display: inline-block; width: 100%;">
                                <h3 class="page-title">
                                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                                        <i class="mdi mdi-bookmark-check"></i>
                                    </span>
                                    <?= $organization->name ?>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
            <?php if ($count % 3 == 0): ?>
            </div>
            <div class="row">
            <?php endif; ?>
        <?php endforeach; ?>
            </div>
            
<?php endif; ?>
<hr>
        <div class="row">
        <div class="col-md-4 grid-margin stretch-card" style="margin-bottom: 1.3rem;">
            <div class="card">
                <div class="card-body" style="padding: 1.7rem;">
                    <div class="clearfix">
                        <a href="<?= base_url('Organization/make') ?>"
                            style="text-decoration: none; color: inherit; display: inline-block; width: 100%;">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-library-plus"></i>
                                </span> Create Organization
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card" style="margin-bottom: 1.3rem;">
            <div class="card">
                <div class="card-body" style="padding: 1.7rem;">
                    <div class="clearfix">
                        <a href="<?= base_url('Organization/search') ?>"
                            style="text-decoration: none; color: inherit; display: inline-block; width: 100%;">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-magnify"></i>
                                </span> Search Organization
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>