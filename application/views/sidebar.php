<div class="col-sm-3 sidebar" style="margin:0px;;padding:0px;">
		<div class="trading">
			<div class="tab">
			  
			  <button class="tablinks" onclick="openNews(event, 'Recent')" id="defaultOpen">Recent</button>
			  <button class="tablinks" onclick="openNews(event, 'Recomended')">Recomended</button>
			 
			</div>

			<div id="Recent" class="tabcontent" >

			  	<a class="btn btn-info" id="btns" href="<?php echo base_url($news_archive_link); ?>">News Archive</a>
					<div class="recents">
						<?php $recents = array_slice($recent, 0); ?>
						<?php echo recentLinks($recents); ?>
					</div>
				
			</div>

			<div id="Recomended" class="tabcontent">
				<a class="btn btn-info" id="btns" href="<?php echo base_url($news_archive_link); ?>">News Archive</a>
			  	<?php $recommended = array_slice($recommended, 0); ?>
				<?php echo article_links($recommended); ?>
				
			</div>
			
			
		</div>
		

		<div class="col-sm-12" style="float:left;padding:0px;">
				
			<div class="col-sm-12" id="col_design" style="padding:10px;border:none;">
				<?php

					$position = array();
					//$count = 0;
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							//dump($position[$po->id]);
							//$count++;
					endforeach; endif; 
				
					//dump($position[3]->id);die();

					$count = 0;
					$no_ads_large = 0;
					$no_ads_small = 0;

					if (count($ads)){

						foreach ($ads as $ad){

							//$advertisment[$count] = $ad;
							
							//dump($ad->img);die();
							if($position[3]->p_id == $ad->position && $ad->status==1){


								if($count == 0){?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>

									<?php $count++; $no_ads_large++;
								}else{?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>
									
									<?php $count = 0; $no_ads_large++;
								}
							}

							if($position[2]->p_id == $ad->position && $ad->status==1){


								if($count == 0){?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>

									<?php $count++; $no_ads_small++;
								}else{?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>


									<?php $count = 0; $no_ads_small++;
								}
							}	
						}
						if($no_ads_large ==1){ ?>

							<div style="background:black;width:100%;padding:30px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
						
						<?php }else if($no_ads_large ==0){ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
						
						<?php }

						if($no_ads_small ==1){ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
						
						<?php }else if($no_ads_small ==0){ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
						
						<?php }
					
					} else{ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
						

					<?php }

					//die();

				?>
				
				
			
				<div class="news_title" style="background:skyblue;">
					<p>Sports</p>
				</div>
				<?php $sports = array_slice($sports, 0); ?>
				<?php echo getSport($sports); ?>
				
			</div>

			<div class="col-sm-12" id="col_design" style="padding:10px;border:none;">
				<div class="news_title" style="background:#e60000;">
					<p>Blog</p>
				</div>
				<?php $blog = array_slice($blog, 0); ?>
				<?php echo getBlog($blog); ?>
				
				<hr/>

				<?php

					$position = array();
					//$count = 0;
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							//dump($position[$po->id]);
							//$count++;
					endforeach; endif;

					$count = 0;
					$no_ads_large = 0;
					$no_ads_small = 0;

					if (count($ads)){

						foreach ($ads as $ad){

							//$advertisment[$count] = $ad;
							
							//dump($ad->img);die();
							if($position[5]->p_id == $ad->position && $ad->status==1){


								if($count == 0){?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>

									<?php $count++; $no_ads_large++;
								}else{?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>
									
									<?php $count = 0; $no_ads_large++;
								}
							}

							if($position[4]->p_id == $ad->position && $ad->status==1){


								if($count == 0){?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>

									<?php $count++; $no_ads_small++;
								}else{?>

									<img class="sidebar_content" src="<?php echo base_url('images/'.$ad->img);?>"/>


									<?php $count = 0; $no_ads_small++;
								}
							}	
						}
						if($no_ads_large ==1){ ?>

							<div style="background:black;width:100%;padding:30px;text-align:center;border:1px solid lightgray;">
								<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[5]->size;?></h2></div>
						
						<?php }else if($no_ads_large ==0){ ?>

							<div style="color:white;background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[5]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[5]->size;?></h2></div>
						
						<?php }

						if($no_ads_small ==1){ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[4]->size;?></h2></div>
						
						<?php }else if($no_ads_small ==0){ ?>

							<div style="color:white;background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[4]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[4]->size;?></h2></div>
						
						<?php }
					
					} else{ ?>

							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[3]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
							<div style="background:black;width:100%;padding:20px;text-align:center;border:1px solid lightgray;">
							<p style="color:white;">Advertisement available</p><h2 style="color:white;"><?php echo $position[2]->size;?></h2></div>
						

					<?php }


				?>
		
			</div>
			
			<div class="col-sm-12" id="col_design" style="padding:10px;border:none;">
				<div class="news_title" style="background:skyblue;">
					<p>Health</p>
				</div>
				<?php $health = array_slice($health, 0); ?>
				<?php echo getHealth($health); ?>
			</div>
				
			
	
			<div class="col-sm-12" id="col_design" style="padding:10px;border:none;">
				<div class="news_title" style="background:skyblue;">
					<p>Education</p>
				</div>
				<?php $education = array_slice($education, 0); ?>
				<?php echo getSport($education); ?>
			</div>
					
				
				

			<div class="col-sm-12" id="col_design" style="padding:10px;border:none;">
				<div class="news_title" style="background:#e60000;">
					<p>Newsletter Signup</p>
				</div>
				<?php echo form_open(); ?>
					<table border="0" cell-padding="5" style="width:100%;">
						<tr>
							<td><input type="email" name="email" placeholder="Enter your email" class="comment_field"/></td>
						</tr>
						
						<tr >
							
							<td style=""><input type="submit" name="signup "class="btn  btn-primary" style="width:100%;border-radius:2px;margin-top:5px;") ?></td>
						</tr>
					</table>		
				<?php echo form_close(); ?>
				<hr>
				
			
			</div>
		</div>


			
		
	</div>