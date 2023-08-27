<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Applied Candidate List</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><center>User Id</center></th>
                    <th><center>Username</center></th>
                    <th><center>Full Name</center></th>
                    <th><center>Reject</center></th>
                    <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($Candidates as $candidate):?>
                    <tr id="row<?=$candidate->uid?>">
                        <td><center><?=$candidate->uid?></center></td>
                        <td><center><?=$candidate->username?></center></td>
                        <td><center><strong><?=$candidate->first_name." ".$candidate->last_name?></strong></center></td>
                        <td><center>
                                <a class="delete-candidate-btn btn btn-gradient-danger" style="padding:0.7rem;" data-uid="<?=$candidate->uid?>">
                                    <i class="mdi mdi-delete-forever"></i>
                                </a>
                            </center></td>
                        <td><center>
                                <form action="<?= base_url("HR/view_profile")?>" method="get">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="candidate_username" value="<?=$candidate->username?>">
                                    <button type="submit" class="btn btn-gradient-primary">View Profile</button>
                                </form>
                            </center></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Candidate Directly with Username</h4>
            <form class="form-inline" action="<?= base_url("HR/view_profile")?>" method="get">
                <?= csrf_field() ?>
                <div class="form-group" style="display: flex; align-items: center;">
                    <label style="flex: 1;">Enter Username: </label>
                    <input class="form-control" type="text" name="candidate_username" placeholder="Candidate Username" style="flex: 1; margin-right: 10px;">
                    <button type="submit" class="btn btn-gradient-primary">Join Organization</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteCandidateBtns = document.querySelectorAll(".delete-candidate-btn");

        deleteCandidateBtns.forEach(btn => {
            btn.addEventListener("click", function () {
                const uid = btn.getAttribute("data-uid");
                const url = '<?=base_url('/HR/remove_candidate/')?>' + uid;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => {
                        if (response.ok) {
                            return response.text(); // Read the response as text
                        } else {
                            throw new Error('Network response was not ok.');
                        }
                    })
                    .then(data => {
                        try {
                            const jsonData = JSON.parse(data); // Parse the response as JSON
                            if (jsonData.success) {
                                const rowToRemove = document.getElementById(uid);
                                if (rowToRemove) {
                                    rowToRemove.remove();
                                }
                            } else {
                                console.log("Removal failed.");
                            }
                        } catch (error) {
                            console.error("Error parsing JSON:", error);
                        }
                    })
                    .catch(error => {
                        console.error("An error occurred:", error);
                    });
            });
        });
    });
</script>
