
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    

                    <div class="row">
    <div class="col-sm-4 col-sm-offset-4 login-div">
        <p class="alert alert-danger form-error">Error occureed</p>
        <div class="page-title">
            <h1 class="text-center">Enter The OTP</h1>
        </div><!-- /.page-title -->

        <form method='post' class='row1'>
            <div class="form-group">
                <!-- <label for="otp-form-input">OTP</label> -->
                <input type="number" class="form-control one-time-otp" min='0' placeholder="One time password" name="otp" id="otp-form-input">

                <span class="text-center text-danger otp-error"></span>
            </div><!-- /.form-group -->

          
        <div class="form-group">
           <!-- <div class="g-recaptcha" data-sitekey="6LeGhywUAAAAAAfn9vrwMsW9__y1BM-UXAq5GR0i"></div> -->
           </div>
    <div class="form-group">
            <button class="btn btn-primary pull-right otp-submit">Submit</button>
            </div>
        </form>


    <form method='post' class='row2' style="display: none;">
            <div class="form-group">
                <!-- <label for="otp-form-input">OTP</label> -->
                <input type="password" class="form-control new-pwd"  placeholder="New Password" id="otp-form-input-1">
                <input type="password" class="form-control new-retype" placeholder="Retype password" id="otp-form-input-2">

                <span class="text-center text-danger error-msg"></span>
            </div><!-- /.form-group -->

          
        <div class="form-group">
           <!-- <div class="g-recaptcha" data-sitekey="6LeGhywUAAAAAAfn9vrwMsW9__y1BM-UXAq5GR0i"></div> -->
           </div>
    <div class="form-group">
            <button class="btn btn-primary pull-right submit-fpassword">Submit</button>
            </div>
        </form>


    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->
