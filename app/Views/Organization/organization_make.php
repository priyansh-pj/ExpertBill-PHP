<div class="col-xl-12 col-sm-12 mb-xl-12 mb-12">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <br>
                <center>
                    <div class="alert alert-warning" role="alert">
                        <strong>Info!</strong> Enter Pincode State and City Will be updated automatically
                    </div>
                </center>
                <form class="form-sample" action="<?= base_url('Organization/create')?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="organization-name" class="form-control-label" style="font-size:1em;">Organization Name<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="name" type="text" placeholder="Organization Name" id="organization-name" required="required">
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                      <label for="organization-email" class="form-control-label" style="font-size:1em;">Organization Email<span style="color:red;"> *</span> : </label>
                      <input class="form-control" name="email" type="email" placeholder="organization@mail.com" id="organization-email" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="organization-gstin" class="form-control-label" style="font-size:1em;">Organization GSTIN : </label>
                      <input class="form-control" name="gstin" type="text" placeholder="Organization GSTIN" id="organization-gstin">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="organization-phone" class="form-control-label" style="font-size:1em;">Phone<span style="color:red;"> * </span> : </label>
                      <input class="form-control" name="phone" type="tel" placeholder="9999999999" id="organization-phone" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="organization-address" class="form-control-label" style="font-size:1em;">Address<span style="color:red;"> * </span> :</label>
                  <input class="form-control" name="address" type="text" placeholder="Organization Address" id="organization-address" required="required">
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="organization-city" class="form-control-label" style="font-size:1em;">City<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="city" type="text" placeholder="Organization Address" id="organization-city" required="required" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="organization-state" class="form-control-label" style="font-size:1em;">State<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="state" type="text" placeholder="Organization State" id="organization-state" required="required" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="organization-pincode" class="form-control-label" style="font-size:1em;">Pincode<span style="color:red;"> * </span> :</label>
                      <input class="form-control" name="pincode" type="number" placeholder="Organization Pincode" id="organization-pincode" required="required">
                    </div>
                  </div>
                </div>
                    <div class="col-12 ml-1 text-end">
                        <input type="submit" class="btn bg-gradient-secondary btn-lg"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#organization-pincode').blur(function() {
            var pincode = $(this).val();
            if (pincode.length == 6) {
                $.ajax({
                    url: 'https://api.postalpincode.in/pincode/' + pincode,
                    type: 'GET',
                    success: function(result) {
                        if (result[0].Status == 'Success') {
                            var city = result[0].PostOffice[0].District;
                            var state = result[0].PostOffice[0].State;
                            $('#organization-city').val(city);
                            $('#organization-state').val(state);
                        }
                    }
                });
            }
        });
    });
</script>
