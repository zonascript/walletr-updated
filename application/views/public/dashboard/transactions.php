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





        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <h6 class="element-header">Recent Transactions</h6>
                    <div class="element-box-tp">

                        <div class="table-responsive">
                            <table class="table table-bordered table-lg table-v2 table-striped">
                                <thead>
                                    <tr>

                                        <th>TxHash</th>
                                        <th>Age</th>
                                        <th>From Total</th>
                                        <th>To</th>
                                        <th>Value</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
<!-- 
                                        <td>John Mayers</td>
                                        <td><img alt="" src="img/flags-icons/us.png" width="25px">
                                        </td>
                                        <td>$245</td>
                                        <td>Organic</td>
                                        <td class="text-center">
                                            123
                                        </td> -->
                                        <td></td>
                                        <td></td>
                                    <td>No Data available</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="controls-below-table">
                            <div class="table-records-info">Showing records 1 - 5</div>
                            <div class="table-records-pages">
                                <ul>
                                    <li><a href="#">Previous</a>
                                    </li>
                                    <li><a class="current" href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a>
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li><a href="#">4</a>
                                    </li>
                                    <li><a href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>