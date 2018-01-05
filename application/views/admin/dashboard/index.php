<h2>Dashboard</h2>
<hr/>

	<div class="col-sm-12" style="padding:5px">
		<div class="panel panel-default collapse in" id="dashboard_notice">
	    	<div class="panel-body">
	    		<p style="float:right;margin-top:-8px;"><a href="#"data-toggle="collapse" data-target="#dashboard_notice">Dismiss</a></p>
	    		
	    		<h3 style="margin:0px;margin-bottom:10px;">Welcome to News++ <?php echo $this->session->username;?></h3>
	    		<p>One an only realible and quick updated newsprotal News++.com</p>



	    	</div>
	  	</div>

	</div>

	<div class="col-sm-6" style="padding:5px;float:left">

		<div class="panel panel-default" style="font-weight:bold;">
	    	<div class="panel-heading" style="height:40px"><h3 style="margin:0px; font-size:18px;font-weight:bold">At a Glance</h3></div>
	      	<div class="panel-body">

	      		<p><a href="<?php echo base_url('admin/article');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;<?php echo $counts_articles;?> Articles</a></p>
	      		
	      		<?php if(is_allowed('Admin')): ?>
	      		<p><a href="<?php echo base_url('admin/page');?>">
	      			<i class="fa fa-files-o"></i>&nbsp;<?php echo $counts_page;?> Pages</a></p>
	      		<?php endif;?>
	      		<p><a href="<?php echo base_url('admin/article');?>"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;<?php echo $counts_commet;?> Comments</a></p>

	      		<?php if(is_allowed('Admin')): ?>
	      		
	      			<p><a href="<?php echo base_url('admin/advertisment/viewads');?>"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;<?php echo $counts_ads;?> Advertisment</a></p>

	      		<?php endif; ?>

	      	</div>
	    </div>
	</div>

	<div class="col-sm-6" style="padding:5px;float:right">

		<div class="panel panel-default" style="font-weight:bold;">
	    	<div class="panel-heading" style="height:40px"><h3 style="margin:0px; font-size:18px;font-weight:bold">Quick actions</h3></div>
	      	<div class="panel-body">

	      		<p><a href="<?php echo base_url('admin/article/edit');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Write an article</a></p>
	      		<?php if(is_allowed('Admin')): ?>
	      		<p><a href="<?php echo base_url('admin/page/edit');?>"><i class="fa fa-files-o"></i>&nbsp; Add a new page</a></p>
	      		<p><a href="<?php echo base_url('admin/advertisment/positions');?>"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp; Add advertisment</a></p>
	      		<p><a href="<?php echo base_url('admin/advertisment/viewads');?>"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp; Published advertisment</a></p>


	      		<?php endif; ?>
	      		<p><a href="<?php echo base_url();?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View your site</a></p>

	      	</div>
	    </div>
	</div>

	<div class="col-sm-6" style="padding:5px;float:left;">

		<div class="panel panel-default" style="font-weight:bold;">
	    	<div class="panel-heading" style="height:40px"><h3 style="margin:0px; font-size:18px;font-weight:bold">Recently published</h3></div>
	      	<div class="panel-body">
	      		<table border="0">
	      		<?php

	      			foreach ($recents as $recents => $recent) { 

	      				$date = date_create($recent->pubdate);
                    	$new_format = date_format($date,"M-d-Y");

	      				?>
	      				
	      				<tr>
	      					<td width="120">
	      						<p><i class="fa fa-angle-right pull-left"></i><span style="font-weight:100;"><?php echo $new_format;?></span></p>
	      					</td>
	      					<td>
	      						<p><a href="<?php echo 'article/comment/'.$recent->id; ?>"><?php echo $recent->title;?></a></p>
	      					</td>
	      				
	      				</tr>

	      			<?php }
	      		?>
	      		</table>
	      		<hr/>
	      		<p><a href="/admin/article"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View all articles</a></p>

	      		
	      	</div>
	    </div>
	</div>
	<?php if(is_allowed('Admin')){ ?>

	<div class="col-sm-6" style="padding:5px;float:left;">

		<div class="panel panel-default" style="font-weight:bold;">
	    	<div class="panel-heading" style="height:40px"><h3 style="margin:0px; font-size:18px;font-weight:bold">Advertisment Income</h3></div>
	      	<div class="panel-body">

	      		<?php 

	      				$collected       = 0;
	      				$to_be_collected = 0;

	      				if(count($advertisments)): foreach($advertisments as $advertisment): 

	      					if($advertisment->payment==1){

	      						$collected = $collected + $advertisment->price;
	      					}else{
	      						$to_be_collected = $to_be_collected + $advertisment->price;
	      					}

	      				endforeach;
	      				?>
	      					<div class="col-sm-6" style="padding:20px;float:left;border-right:1px solid lightgray;">
		      					<p style="color:#4d94ff;">Total Income</p>
		      					
		      					<?php if($collected != 0) : ?>
			      				
			      					<p>Collected from <?php echo $collected_from;?> Advertisment</p>
			      					<p>Total collected amount is Rs.<?php echo $collected; ?>/-</p>
			      				
			      				<?php else: ?>

			      					<p>No fund collected yet</p>

			      				<?php endif; ?>
		      		
		      				</div>

				      		<div class="col-sm-6" style="padding:20px;float:left;">
				      			<p style="color:#4d94ff;">Total Due</p>
				      			<?php if($to_be_collected != 0) : ?>
					      			
					      			<p>Payment is to be collected from <?php echo $to_be_collected_from?></p>
					      			<p>Total amount to be collected is Rs.<?php echo $to_be_collected?>/-</p>

					      		<?php else: ?>

			      					<p>All the fund are collected.</p>

			      				<?php endif; ?>

				      		</div>

	      			
	      				<?php else: ?>
	      					<p>There is no any advertisment published yet.</p>

	      				<?php endif;

	      			?>


	      	</div>
	    </div>
	</div>
	<?php }?>