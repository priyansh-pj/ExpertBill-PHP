<div class="col-xl-12 col-sm-12 mb-xl-12 mb-12">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <br>
                <form class="form-sample" action="<?= base_url('HR/create_employee')?>" method="post">
                    <?= csrf_field() ?>
                    <input name="username" type="hidden" value="<?=$username?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="candidate-first-name" class="form-control-label" style="font-size:1em;">Candidate First Name<span style="color:red;"> *</span> : </label>
                                <input class="form-control" name="first_name" type="text" value="<?=$candidate_profile->first_name?>" id="candidate-first-name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="candidate-last-name" class="form-control-label" style="font-size:1em;">Candidate Last Name<span style="color:red;"> *</span> : </label>
                                <input class="form-control" name="last_name" type="text" value="<?=$candidate_profile->last_name?>" id="candidate-last-name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="candidate-email" class="form-control-label" style="font-size:1em;">Email<span style="color:red;"> *</span> : </label>
                                <input class="form-control" name="email" type="text" value="<?=$candidate_profile->email?>" id="candidate-email" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="candidate-phone" class="form-control-label" style="font-size:1em;">Phone<span style="color:red;"> * </span> : </label>
                                <input class="form-control" name="phone" type="tel" value="<?=$candidate_profile->contact_no?>" id="candidate-phone" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="candidate-address" class="form-control-label" style="font-size:1em;">Address<span style="color:red;"> * </span> :</label>
                        <input class="form-control" name="address" type="text" placeholder="Candidate Address" id="candidate-address">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="candidate-govt" class="form-control-label" style="font-size:1em;">Candidate Govt. :</label>
                                <input class="form-control" name="govt" type="text" placeholder="Candidate Govt." id="candidate-govt">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="candidate-salary" class="form-control-label" style="font-size:1em;">Salary<span style="color:red;"> * </span> :</label>
                                <input class="form-control" name="salary" type="number" placeholder="Candidate Salary" id="candidate-salary" required="required" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="candidate-role" class="form-control-label" style="font-size:1em;">Role<span style="color:red;"> * </span> : (Use Ctrl for multiple Select)</label>
                                <select class="form-control" id="candidate-role" name="candidate_role[]" multiple>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Sales">Sales</option>
                                    <option value="HR">HR</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Analyst">Analyst</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 ml-1 text-end">
                        <input type="submit" class="btn bg-gradient-success btn-lg"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>