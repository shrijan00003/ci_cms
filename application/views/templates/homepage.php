<!-- this is view for homepage template -->
<div class="row">
	<div class="col-sm-9" >
		<div class="row">
			<!---<div class="news_title">
				<p>Featured News</p>
			</div>- -->
			<div class="col-sm-12" style="" id="col_design">
				
				<?php 
					if(isset($articles[0])) echo html_entity_decode(get_excerpt($articles[0]));
					
					echo "<hr style='background:lightgray;height:1px;'/>";
					if(isset($articles[1])) echo html_entity_decode(get_excerpt($articles[1]));
					echo "<hr style='background:lightgray;height:1px;'/>";
					if(isset($articles[2])) echo html_entity_decode(get_excerpt($articles[2]));
					echo "<hr style='background:lightgray;height:1px;'/>";
					

				?>
				<?php

					$position = array();
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							
					endforeach; endif; 
					$count1 = 0;
					$count2 = 0;
					
					if (count($ads)){

						foreach ($ads as $ad){

							if($position[9]->p_id == $ad->position && $ad->status==1){ ?>

								<img style="float:right;width:100%; margin-top:8px;" src="<?php echo base_url('images/'.$ad->img);?>"/>
								<?php $count1++;
							}
							if($position[10]->p_id == $ad->position && $ad->status==1){ ?>

								<img style="float:right;width:100%; margin-top:10px;" src="<?php echo base_url('images/'.$ad->img);?>"/>
								<?php $count2++;
							}

						}

						if($count1==0) { ?>

							<div style="padding:20px;float:right;width:100%; background:black;margin-top:10px;text-align:center;">
							<h2 style="color:white;">Advertisment here <?php echo $position[9]->size;?></h2></div>
							
						<?php }

						if($count2==0) { ?>

							<div style="padding:20px;float:right;width:100%; background:black;margin-top:10px;text-align:center;">
							<h2 style="color:white;">Advertisment here <?php echo $position[10]->size;?></h2></div>
							
						<?php }

					}else{ ?>
						<div style="padding:20px;float:right;width:100%;background:black; margin-top:0px;text-align:center;">
						<h2 style="color:white;">Advertisment here <?php echo $position[9]->size;?></h2></div>

						<div style="padding:20px;float:right;width:100%;background:black; margin-top:20px;text-align:center;">
						<h2 style="color:white;">Advertisment here <?php echo $position[10]->size;?></h2></div>
							
					<?php }
				?>
				
			</div>
		</div>
		<div class="row">
			
			<div id="news_columns" class="col-sm-5" style="padding:0px;">
				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:#b30000;">
							<p>Politics</p>
						</div>
						<?php $politics = array_slice($politics, 0); ?>
						<?php echo getPolitics($politics); ?>
					</div>
				</div>
				
				
				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>Community</p>
						</div>
						<?php $communities = array_slice($community, 0); ?>
						<?php echo getCommunity($communities); ?>
					</div>
					
				</div>

				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>Business</p>
						</div>
						<?php $business = array_slice($business, 0); ?>
						<?php echo getBusiness($business); ?>
						
						<img style="width:100%; margin-top:0px" src="<?php echo base_url('images/91e91b91c9f4a14056f41ad7e50f439a.gif');?>"/>
					</div>
					
				</div>

				
				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>Entertainment</p>
						</div>
						<?php $entertainments = array_slice($entertainment, 0); ?>
						<?php echo getEntertainment($entertainments); ?>
					</div>
					
				</div>
				
				
			</div>

			<div id="news_columns" class="col-sm-7" style="padding:0px;">
				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:#b30000;">
							<p>Technology</p>
						</div>
						<?php $tech = array_slice($technology, 0); ?>
						<?php echo getTech($tech); ?>
						
					</div>
				</div>
				
				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>World</p>
						</div>
						<?php $world = array_slice($world, 0); ?>
						<?php echo getWorlds($world); ?>
					</div>
					
				</div>

				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>Economy</p>
						</div>
						<?php $economy = array_slice($economy, 0); ?>
						<?php echo getEconomy($economy); ?>
						
					</div>
					
				</div>

				<div class="col-sm-12" style="float:left;padding:0px;">
					
					<div class="col-sm-12" id="col_design">
						<div class="news_title" style="background:skyblue;">
							<p>Art & Literature</p>
						</div>
						<?php $arts = array_slice($art_literature, 0); ?>
						<?php echo getArts($arts); ?>
					</div>
					
				</div>
				
				

			</div>
		</div>
		
	</div>
	<div class="span3 sidebar" style="margin:0px;">
			<?php $this->load->view('sidebar'); ?>
	 </div>
</div>