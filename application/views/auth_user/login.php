<div class="card shadow" style="width: 700px; margin: 50px auto; border-radius: 12px;">
    <div class="row justify-content-center p-3 my-3">
        <div class="col-lg-10 col-md-10 col-12">
            <h2 class="text-center">Login Page</h2>
            <p class="text-center rounded" style="background-color: #d2dbdb; width: 130px; margin:0 auto; font-size: 12px;">For Administrator</p>
            <div class="px-5 py-3">
                <?php echo $this->session->flashdata('message') ?>
                <form action="<?php echo base_url('auth_user') ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email">
                        <?php echo form_error('email', '<small class="text-danger ps-2">', '</small>') ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        <?php echo form_error('password', '<small class="text-danger ps-2">', '</small>') ?>
                    </div>
                    <button type="submit" class="btn btn-info text-white py-1 px-3" style="display: inline !important;">Login</button>
                    <!-- <a href="<?php echo base_url('lupapassword') ?>" class="text-decoration-none mt-2" style="display: inline !important; float: right">Lupa password?</a> -->
                </form>
            </div>
        </div>
    </div>
</div>