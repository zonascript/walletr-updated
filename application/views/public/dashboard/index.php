<div class="content-i">
  <div class="content-box">
<div class="loading">Loading&#8230;</div>
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
                 <!-- find the coinbase price -->
                
             
     
                 <div class="row">
                    <div class="col-sm-4">
                       <div class="element-box el-tablo box-shadow crypto-type">
                          <div class="value ">1.<?php echo $current_wallet->current_wallet; ?></div>
                       </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="element-box el-tablo box-shadow crypto-price">
                          <div class="value ">$<?php echo isset($current_price) ? $current_price->USD :'Nill'; ?> USD</div>
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
     <div class="row">
        <div class="col-sm-6">
           <div class="element-wrapper">
              <h6 class="element-header">Most Recent Activity</h6>
              <div class="element-box box-shadow">
                 <h4>Welcome to your Activity Feed</h4>
                 <p>No transactions yet? No problem. Get started by adding some bitcoins to your wallet!</p>
                 <div class="element-box-content"><button class="mr-2 mb-2 btn btn-primary send-btn btn-rounded " type="button"> Buy BDC</button></div>
              </div>
           </div>
        </div>
        <div class="col-sm-6">
           <div class="element-wrapper">
              <h6 class="element-header">Did You Know?</h6>
              <div class="element-box box-shadow">
                 <h4>
                    <i class="os-icon os-icon-graph-down"></i>
                    Why does my balance keep changing?
                 </h4>
                 <p>Your bitcoin balance will never change. However, as the exchange rate of bitcoin fluctuates you will see changes in the local currency estimation of your wallet balance. Simply click the balance to switch between bitcoin and your local currency.</p>

              </div>
           </div>
        </div>
     </div>
  </div>
</div>