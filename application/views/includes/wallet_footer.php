 </div>
        </div>
    </div>
    <!--------------------
                     END - Sidebar
                     -------------------->
    </div>



<!-- model -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                             <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="address-loader">
                                  <img src="<?php echo base_url('assets/assets/img/address-loader.gif'); ?>"  class='img-responsive'>
                                </div>
                                   <div class="modal-header">
                                      <h2 class="modal-title">
                                         Send : <span class='curr-wallet'><?php echo $current_wallet->current_wallet; ?></span><br>
                                         <p style="font-size: 14px;">Instantly send bitcoin to any bitcoin address.</p>
                                      </h2>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                      </button>
                                   </div>
                                   <div class="modal-body">
                                   <p class="alert alert-success transfer-success text-center"></p>
                                   <p class="alert alert-danger main-error text-center">
                                     
                            <?php 

                            if( !isset($balance) ){
                              echo 'Could not fetch the balance';
                            }elseif($balance->balance==0){
                              echo 'In sufficient balance !';
                            } 

                            ?>

                                   </p>
                                     <div class="send-div-one">
                                      <form>
                                         <div class="form-group">
                                            <label for=""> To:</label>
                                            <input class="form-control transfer-to" data-crypto='<?php echo strtolower($current_wallet->current_wallet); ?>' placeholder="Paste an address or select a destination" type="text">
                                         </div>
                                         <div class="row">
                                            <div class="col-sm-6">
                                               <div class="form-group">
                                                  <label class='curr-wallet'> <?php echo $current_wallet->current_wallet; ?>:</label>
                                                  <input class="form-control transfer-amount" min='0' placeholder="0" type="number">
                                                  <span class="error btc-error text-danger"></span>
                                               </div>
                                            </div>
                                            <div class="col-sm-6">
                                               <div class="form-group">
                                                  <label for="">USD:</label>
                                                  <input type="hidden" class='price-hidden' value='<?php echo isset($current_price) ? $current_price->USD :'0'; ?>'>
                                                  <input class="form-control usd-price" readonly placeholder="0" type="number">
                                                  <?php 

                                                   if( isset($balance) ){
                                                      $bl = $balance->balance;
                                                    }

                                                  ?>
                                                  <input type="hidden" value='<?php echo $bl; ?>' class='current-balance'>
                                                  <span class="error usd-error text-danger"></span>
                                               </div>
                                            </div>
                                         </div>
                                      
                                      </form>

                                      </div>

                                      <div class="send-div-2">
                                         <form>
                                            <div class="form-group">
                                              <label for=""> Password:</label>
                                              <input class="form-control wallet-password" data-crypto='<?php  echo strtolower($current_wallet->current_wallet); ?>' placeholder="Enter your password" type="password">
                                                <span class='text-danger transfer-pass-error'></span>
                                              </div>

                                         </form>
                                      </div>
                                      <div class="video-qr text-center" >
                                        <video autoplay></video>
                                        <p class="text-center">
                                          <!-- <button id="reset">Reset</button> -->
                                          <button id="stop" >Close</button>
                                        </p>
                                      </div>
                                   </div>
                                   <div class="modal-footer">
                                   <?php 
                                    $class  = 'next-step';
                                    // print_r($balance);
                                     if( !isset($balance) || $balance->balance==0 ){
                                      $class='disabled';
                                    }

                                   ?>
                                        <button type="button"  class='scan-qr-code'>Scan QRcode</button>
                                        <button type="button"  class="btn btn-secondary back">Back</button>
                <button type="button" data-crypto='<?php echo $current_wallet->current_wallet; ?>'  data-valid='false' class="btn change-w my-btn-check btn-primary <?php echo $class; ?>">Next</button>
                <button type="button" data-crypto='<?php echo $current_wallet->current_wallet; ?>'  data-valid='false' class="btn change-w btn-primary send-crypto-btn ">Proceed</button>

                                   </div>
                                </div>
                             </div>
                          </div>
<!-- model -->

<!-- model recieve -->
<div class="modal fade bd-example-modal-Receive" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <h2 class="modal-title">
                                         Receive<br>
                                         <p style="font-size: 14px;">A new address has been created for you to receive bitcoins</p>
                                      </h2>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                      </button>
                                   </div>
                                   <div class="modal-body wallet-popup">
                                      <div class="row">
                                         <div class="col-md-6 " style="border-right: 1px solid #ccc;">
                                            <h4 class="scan">Copy and Share</h4>
                                            <div class="code wallet-address copy-to-clipboard"><?php echo $current_wallet->wallet_address; ?></div>
                                         </div>
                                         <div class="col-md-6">
                                            <h4 class="scan">Scan</h4>
                                            <div id="wallet-qrcode"></div>
                                           <!--  <img class="img-scan" src="<?php //echo base_url('assets/'); ?>img/scan.png"> -->
                                         </div>
                                      </div>
                                   </div>
                                   <div class="modal-footer">
                                     
                                      <button type="button" class="btn btn-primary">Done</button>
                                   </div>
                                </div>
                             </div>
                          </div>
<!-- model recieve end-->
    <div class="display-type"></div>

    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/moment/moment.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/dropzone/dist/dropzone.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/util.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/button.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="<?php echo base_url('assets/dashboard/'); ?>js/mainc599.js?version=3.3"></script>
    <script src="http://peterolson.github.com/BigInteger.js/BigInteger.min.js"></script>
   
    <script>
        var ajax_url = '<?php echo base_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/qrcode.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/script.js"></script>

    <script>
      var qrcode = new QRCode("wallet-qrcode",{
          text: '<?php echo $current_wallet->wallet_address; ?>',
          width: 128,
          height: 128,
          colorDark : "#000000",
          colorLight : "#ffffff",
          correctLevel : QRCode.CorrectLevel.H
      });

      // qrcode.makeCode();
    </script>
    <script src="<?php echo base_url('assets'); ?>/build/qcode-decoder.min.js"></script>

    <script type="text/javascript">
   
    var video = document.querySelector('video');
    // var reset = document.querySelector('#reset');
    var stop = document.querySelector('#stop');

    $('.scan-qr-code').on('click',function(){

      $('.send-div-one').slideUp();
      $('.send-div-2').slideUp();
      $('.next-step').show();
      $('.video-qr').slideDown();
      $('.send-crypto-btn').hide();

      var qr = new QCodeDecoder();

    if (!(qr.isCanvasSupported() && qr.hasGetUserMedia())) {
      alert('Your browser doesn\'t match the required specs.');
       $('.video-qr').slideDown();
       $('.send-div-one').slideDown();
      throw new Error('Canvas and getUserMedia are required');
    }



    function resultHandler (err, result) {
      if (err){

        console.log(err.message);
        return false;
      }
      

      if (result) {
        
        // alert(result);
        $('.transfer-to').val(result);
        $('.send-div-one').slideDown();
        $('.video-qr').slideUp();
        qr.stop();


      } 
    }

    // prepare a canvas element that will receive
    // the image to decode, sets the callback for
    // the result and then prepares the
    // videoElement to send its source to the
    // decoder.

    qr.decodeFromCamera(video, resultHandler);


    // attach some event handlers to reset and
    // stop whenever we want.

    // reset.onclick = function () {
    //   qr.decodeFromCamera(video, resultHandler);
    // };
    // $('#stop').on('click',function(){
      
    // });
    // console.log(qr);

    stop.onclick = function () {

      $('.video-qr').slideUp();
       $('.send-div-one').slideDown();
       

      qr.stop();

    };
  });

  /*(function () {
    'use strict';

    var qr = new QCodeDecoder();

    if (!(qr.isCanvasSupported() && qr.hasGetUserMedia())) {
      alert('Your browser doesn\'t match the required specs.');
      throw new Error('Canvas and getUserMedia are required');
    }

    var video = document.querySelector('video');
    // var reset = document.querySelector('#reset');
    var stop = document.querySelector('#stop');


    function resultHandler (err, result) {
      if (err)
        return console.log(err.message);
      

      if (result) {
        
        // alert(result);
        $('.transfer-to').val(result);
        qr.stop();


      } 
    }

    // prepare a canvas element that will receive
    // the image to decode, sets the callback for
    // the result and then prepares the
    // videoElement to send its source to the
    // decoder.

    qr.decodeFromCamera(video, resultHandler);


    // attach some event handlers to reset and
    // stop whenever we want.

    // reset.onclick = function () {
    //   qr.decodeFromCamera(video, resultHandler);
    // };
    // $('#stop').on('click',function(){
      
    // });
    // console.log(qr);
    stop.onclick = function () {
      qr.stop();

    };

  })();*/
  </script>
</body>

</html>