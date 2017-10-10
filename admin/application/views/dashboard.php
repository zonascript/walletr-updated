
		  <div class="col-md-10 right-div" style="min-height: 560px;">
		  	<div class="row">
		  		<div class="col-md-3">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Total Coins</div>
						</div>
		  				<div class="panel-body " style='font-size: 14px;' >
		  					<?php echo isset($main_balance) ? $main_balance : ''; ?>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Total Users</div>
						</div>
		  				<div class="panel-body " style='font-size: 14px;'>
		  					<?php echo $total_users; ?>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Total Transactions</div>
						</div>
		  				<div class="panel-body " style='font-size: 14px;'>
		  					....
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Unconfirmed</div>
						</div>
		  				<div class="panel-body " style='font-size: 14px;'>
		  					....
		  				</div>
		  			</div>
		  		</div>

		  		<div class="col-md-12 show-hide send-bdc-div" >
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Send BDC to user</div>
								<h4 class="alert-success alert success-msg" style="display: none;"></h4>
								<form role="form" class="admin-transaction">
									<div class="form-group">
										<input type="number" data-price='65' placeholder="Rupees" class="form-control" id="bdc-price" />
									</div>
									<div class="form-group">
										 
										<input type="text" class="form-control" placeholder="Total Coins to be send" id="bdc-amount" readonly/>
									</div>
									<div class="form-group"> 
										<input type="text" placeholder="Blackdiamond coin address" class="form-control" id="bdc-address" />
										<span class="dbc-error text-danger"></span>
									</div>
									
									
									<button type="submit" class="btn btn-primary send-bdc-btn">
										Send BDC
									</button>
								</form>
				  			</div>
		  				</div>
		  			</div>
		  		</div>
	
		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Users list</div>
								
								<div class="panel-options">
									<a href="javascript:void(0);" class="show-admin-div" data-rel="collapse"><i class="glyphicon glyphicon-arrow-right"></i> Send BDC</a>
									
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				
					  		<table class="table">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>username</th>
				                  <th>Email</th>
				                  <th>Phone</th>
				                  <th>current wallet</th>
				                </tr>
				              </thead>
				              <tbody>
				              	<?php $i=1; ?>
				               <?php if(isset($users)): ?>
				               	<?php foreach ($users as $user): ?>
				                <tr>
				                  <td><?php echo $i; ?></td>
				                  <td><?php echo $user->username; ?></td>
				                  <td><?php echo $user->email; ?></td>
				                  <td><?php echo $user->phone; ?></td>
				                  <td><?php echo $user->current_wallet; ?></td>
				                </tr>
				            <?php $i++; endforeach; ?>
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

 