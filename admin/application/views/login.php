<!DOCTYPE html>
<html>
  <head>
    <title>BlackDiamoindCoin Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url('assets/'); ?>css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo text-center">
	                 <h1><a href="<?php echo base_url(); ?>">BlackDiamoindCoin Admin Login</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			                <div class="social text-danger form-error" style="font-size: 14px;">
	                            
	                        </div>
			                <input class="form-control email" type="text" placeholder="E-mail address">
			                <input class="form-control password" type="password" placeholder="Password">
			                <div class="action">
			                    <a class="btn btn-primary login">Login</a>
			                </div>                
			            </div>
			        </div>

			       <!--  <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.html">Sign Up</a>
			        </div> -->
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/custom.js"></script>
   	<script type="text/javascript">
   		var ajax_url  = '<?php echo base_url(); ?>';
   	</script>
    <script src="<?php echo base_url('assets/'); ?>js/script.js"></script>
  </body>
</html>