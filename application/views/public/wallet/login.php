
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    


                    <div class="row">
    <div class="col-sm-4 col-sm-offset-4 login-div">
    <p class="alert alert-danger form-error">Error occureed</p>
    <?php if($this->session->flashdata('fmsg')): ?>

        <p class="alert alert-success"><?php echo $this->session->flashdata('fmsg'); ?></p>
    <?php endif; ?>
        <div class="page-title">
            <h1 class="text-center">Login</h1>

        </div><!-- /.page-title -->

        <form method='post'>
            <div class="form-group">
                <label for="login-form-email">Username</label>
                <input type="text" class="form-control" name="username" id="login-form-username">

            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="login-form-password">Password</label>
                <input type="password" class="form-control" name="password" id="login-form-password">
            </div><!-- /.form-group -->
        <div class="form-group">
          <!-- <div class="g-recaptcha" data-sitekey="6LdsVS4UAAAAAPUgXPy1KTU4C4paceAG8iW1fwFV"></div> -->

           </div>
    <div class="form-group text-center">
            <button class="btn btn-primary user-login">Login</button>
            </div>
        </form>
        <p class="text-right"><a href="<?php echo base_url('login/forgot_password'); ?>">Forgot Password ?</a></p>
    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->
