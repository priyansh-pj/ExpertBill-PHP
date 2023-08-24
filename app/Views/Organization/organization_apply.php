<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline" action="<?= base_url("Organization/join") ?>" method="POST">
            <?= csrf_field() ?>
                <div class="form-group" style="display: flex; align-items: center;">
                    <label style="flex: 1;">Enter Organization id (Provided by Organization HR ): </label>
                    <input type="number" name="organization-id" placeholder="Organization id" style="flex: 1; margin-right: 10px;">
                    <button type="submit" class="btn btn-gradient-primary mb-2">Join Organization</button>
                </div>
            </form>
        </div>
    </div>
</div>