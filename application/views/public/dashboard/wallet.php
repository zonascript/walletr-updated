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




        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php if(isset($all_wallet_balance)): ?>
                      <?php $name = array('BTC'=>'Bitcoin','LTC'=>'Litecoin','DOGE'=>'Dogecoin','DASH'=>'Dashcoin','ETH'=>'Ethereum','BDC'=>'Blackdiamond coin'); ?>
                    <div class="row">
                    <?php foreach ($all_wallet_balance as $wallet): ?>
                       <?php //if($wallet->is_active): ?>
                        <div class="col-sm-4" id='wallet_<?php echo $wallet->wallet_type; ?>'>
                            <div class="box el-tablo box-shadow">

                                <h5 class="box"><?php echo htmlentities($name[$wallet->wallet_type]); ?></h5>
                                <p class="colum"><?php echo htmlentities($wallet->wallet_type); ?></p>
                                <div class="colum-bottom"> Amount: <?php echo htmlentities($wallet->balance); ?></div>
                            </div>
                        </div>
                      <?php //endif;  ?>
                       
                  <?php endforeach; ?>
                  
                    </div>
                  <?php endif; ?>

                  
                </div>

                <!-- <div class="col-md-3">
                    <div class="crypto-box">

                        <h4>Select wallets</h4>    
                        <ul class='coin-list-menu'>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='BTC' checked/> Bitcoin </label>  </li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='DOGE' checked/> Dogecoin </label>  </li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='LTC' checked/> Litecoin </label>  </li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='ETC' /> Ethereum Classic </label></li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='DASH' /> Dash </label>  </li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='XMR' /> Monero </label>  </li>
                            <li><label> <input type='checkbox' name='crypto-currency'  class='crypto-coin' value='BDC' /> Black Diamon coin </label>  </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>