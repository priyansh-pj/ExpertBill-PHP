<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form class="form-inline">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Organizations</label>
                        <select class="form-control">
                            <?php foreach ($Organization as $Company) : ?>
                                <option value="<?= $Company->id ?>"><?= $Company->id ?>.)<?= $Company->name ?> <?php if ($Company->gst_id) {
                                                                                                                    echo "({$Company->gst_id})";
                                                                                                                } ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>