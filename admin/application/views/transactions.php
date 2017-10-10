
		  <div class="col-md-10 right-div" style="min-height: 560px;">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Transactions</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
					  		<table class="table">
				              <thead>
				                <tr>
				                  <th>Txn hash</th>
				                  <th>From</th>
				                  <th>To</th>
				                  <th>Age</th>
				                  <th>Amount</th>
				                </tr>
				              </thead>
				              <tbody>
				              	
				               <?php if(isset($transactions)): ?>
				               	<?php foreach ($transactions as $transaction): ?>
				               		
				               		<?php if($transaction['category']=='move'){  ?>
						                <tr class=' ?>'>
						                  <td><?php echo '-'; ?></td>
						                  <td><?php echo !empty($transaction['account']) ? $transaction['account'] : 'Server admin'; ?></td>
						                  <td><?php echo !empty($transaction['otheraccount']) ? $transaction['otheraccount'] : 'Server admin'; ?></td>
						                  <td><?php echo timeago($transaction['time']); ?></td>
						                  <td><?php echo $transaction['amount']; ?>
						                  </td>
						                </tr>
					                <?php } else { ?>

										 <tr class=''>
						                  <td><?php echo $transaction['txid']; ?></td>
						                  <td><?php echo !empty($transaction['account']) ? $transaction['account'] :'Server Admin' ; ?></td>
						                  <td><?php echo $transaction['address']; ?></td>
						                  <td><?php echo timeago($transaction['time']); ?></td>
						                  <td><?php echo $transaction['amount']; ?></td>
						                </tr>

					                <?php } ?>
				            <?php endforeach; ?>
				               <?php endif; ?>
				              </tbody>
				            </table>
							</div>
		  				</div>
		  			</div>
		  			
		  		</div>
		  	</div>

		  </div>
		</div>
    </div>

 