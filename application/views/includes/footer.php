
    <footer class="footer">
    
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-left">
                &copy; 2017 All rights reserved.<a href="#"> BlackDiamondCoin</a>.
            </div><!-- /.footer-bottom-left -->

            <div class="footer-bottom-right">
                <ul class="nav nav-pills">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="javascript:void(0);">Wallet</a></li>
                    <li><a href="javascript:void(0);">Terms &amp; Conditions</a></li>
                    <li><a href="javascript:void(0);">Contact</a></li>
                </ul><!-- /.nav -->
            </div><!-- /.footer-bottom-right -->
        </div><!-- /.container -->
    </div>
</footer><!-- /.footer -->

</div><!-- /.page-wrapper -->

<script>
        /* Use fonts with class name in sequence => f-1, f-2, f-3 .... */
        var fgroup = [
            'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i',
            'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
            'Fauna One'
        ];
    </script>
<script src="<?php echo base_url('assets/'); ?>assets/js/jquery.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>


<script src="<?php echo base_url('assets/'); ?>assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url('assets/'); ?>assets/libraries/owl.carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

<script src="<?php echo base_url('assets/'); ?>assets/js/superlist.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/jquery/jquery-1.12.4.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/bootstrap/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/plugins.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/pace/pace.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/anime.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/structure.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nc.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- EFFECT -->
    <?php 

         $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


       // if (strpos($url,'/wallet') == true) { ?>

            <script type="text/javascript" src="<?php echo base_url('assets/'); ?>lib/circuit/circuit.js"></script>
        <?php // } ?>

        <script>


        var ajax_url = '<?php echo base_url(); ?>';
    </script>

<?php   $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url,'/dashboard') == true) { 

?>
    <script type="text/javascript">
        setInterval(function(){
        check_session();
    },3000);


    </script>
    <?php } ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/script.js"></script>

</body>


</html>
