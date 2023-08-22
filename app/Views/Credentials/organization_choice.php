<?php if (!empty($organizations)) : ?>
    <div class="row">
        <?php foreach ($organizations as $organization) : ?>
            <?php $count = 0 ?>
            <div class="col-md-4 grid-margin stretch-card" style="margin-bottom:1.3rem">
                <div class="card">
                    <div class="card-body" style="padding:1.7rem;">
                        <div class="clearfix">
                            <h3>
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span><?= $organization->name ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
            <?php if ($count % 3 == 0) : ?>
    </div>
    <div class="row">
    <?php endif; ?>
<?php endforeach; ?>
    </div>

<?php endif; ?>