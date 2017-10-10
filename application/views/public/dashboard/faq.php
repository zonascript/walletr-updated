<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
           <div class="element-wrapper">
              <div class="element-content">
                 <div class="row">
                     <div class="col-md-10">
                        <div class="crypto-box-top">

                        <h4>Select current wallet</h4>    
                        <ul class='coin-list-menu'>
                            <li><label>
                                  <img src="<?php echo base_url('assets/img/btc.ico');  ?>" height='40'>
                             <input type='radio' name='crypto-currency'  class='crypto-coin' value='BTC' <?php echo (isset($current_wallet) && $current_wallet->current_wallet=='BTC') ? 'checked' : ''; ?>/> <span>Bitcoin </span></label>  </li>
                            <li><label> 
                              <img src="<?php echo base_url('assets/img/eth.png');  ?>" height='35'>
                              <input type='radio' name='crypto-currency'  class='crypto-coin' value='ETH' <?php echo (isset($current_wallet) && $current_wallet->current_wallet=='ETH') ? 'checked' : ''; ?>/> <span>Ethereum</span>  </label>  </li>
                            <li><label> 
                            <img src="<?php echo base_url('assets/img/ltc.png');  ?>" height='35'>
                              <input type='radio' name='crypto-currency'  class='crypto-coin' value='LTC' <?php echo (isset($current_wallet) && $current_wallet->current_wallet=='LTC') ? 'checked' : ''; ?>/><span>Litecoin</span>   </label>  </li>
                            <li><label> 
                                 <img src="<?php echo base_url('assets/img/dash.png');  ?>" height='35'>
                              <input type='radio' name='crypto-currency'  class='crypto-coin' value='DASH' <?php echo (isset($current_wallet) && $current_wallet->current_wallet=='DASH') ? 'checked' : ''; ?>/><span>Dashcoin</span>   </label></li>
                         
                            <li><label>
                                <img src="<?php echo base_url('assets/img/bdc.png');  ?>" height='35'>
                               <input type='radio' name='crypto-currency'  class='crypto-coin' value='BDC' <?php echo (isset($current_wallet) && $current_wallet->current_wallet=='BDC') ? 'checked' : ''; ?>/> <span>Blackdiamond coin</span>  </label>  </li>
                           
                        </ul>
                    </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col-sm-4">
                       <div class="element-box el-tablo box-shadow crypto-type">
                          <div class="value ">1.<?php echo $current_wallet->current_wallet; ?></div>
                       </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="element-box el-tablo box-shadow crypto-price">
                          <div class="value ">$<?php echo isset($current_price) ? $current_price->USD :'Nill'; ?>USD</div>
                       </div>
                    </div>
                    <div class="col-sm-4">
                       <h6 class="element-header">
                          BE YOUR OWN BANK.
                       </h6>
                       <div class="el-buttons-list full-width">
                          <div class="actions-right"><a class="btn btn-default send-btn" data-toggle="modal" data-target=".bd-example-modal-lg" href="#"><i class="os-icon os-icon-mail-18"></i><span>Send </span></a></div>
                    
                          <button class="btn btn-primary my-btn" data-toggle="modal" data-target=".bd-example-modal-Receive">
                          <i class="os-icon os-icon-arrow-2-down"></i>Receive</button>
                          
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        </div>

        <!--------------------
        END - Chat Popup Box
        -------------------->

        <!--------------------
     START - Sidebar
     -------------------->




        <div class="older-pack box-shadow" style="display: block;">
            <div class="aec-full-message-w">
                <div class="aec-full-message">
                    <div class="message-head">
                        <div class="user-w with-status status-green">

                            <div class="user-name">
                                <h6 class="user-title">FAQ</h6>

                            </div>
                        </div>
                        <!-- <div class="message-info">7747407f-6b85-4e87-b188-ea8ea827ae62</div> -->
                    </div>
                    <div class="message-content">Wallet ID is your unique identifier. It is completely individual to you, and it is what you will use to log in and access your wallet. It is not a bitcoin address for sending or receiving. Do not share your Wallet ID with others.</div>
                    <div class="message-content">Mobile App Pairing Code
                        <br> Scan the code (click on 'Show Pairing Code') with your Blockchain Wallet (iOS or Android) for a seamless connection to your wallet. Download the iOS app here and the Android app her</div>
                </div>
            </div>
        </div>

    </div>
</div>