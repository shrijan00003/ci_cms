<div class="row">
	<div class="col-sm-9" style="">
		<div class="row" style="">
			<div class="col-sm-12" id="col_design">

				<?php	
					if(isset($articles[0])) echo html_entity_decode(get_excerpt($articles[0]));
					//if(isset($articles[1])) echo html_entity_decode(get_excerpt($articles[1]));


				?>
				<hr>
					<div class="news_title">
						<p><?php echo strtoupper($this->uri->segment(1)); ?></p>
					</div>
					<?php
				

					if(isset($articles[0])){

						if($pagination): ?>
							<section class="pagination" style="float:right;margin-top:20px;margin-bottom:-50px;"><?php echo $pagination; ?></section>
						<?php endif;


						}

						for($i=0; $i<15;$i++){
							if(isset($articles[$i])) {
								echo "<div class='pages_news'>";
								echo get_excerpt_pages($articles[$i]);
								echo "</div>";
							}
							
						}

						//advertisment dynamic
					$position = array();
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							
					endforeach; endif; 
					$count = 0;
					
					if (count($ads)){

						foreach ($ads as $ad){

							if($position[10]->p_id == $ad->position && $ad->status==1){ ?>

								<img style="float:right;width:100%; margin-top:20px;" src="<?php echo base_url('images/'.$ad->img);?>"/>
								<?php $count++;
							}

						}

						if($count==0) { ?>

							<div style="padding:20px;float:right;width:100%; background:black;margin-top:20px;text-align:center;">
							<h2 style="color:white;">Advertisment here <?php echo $position[10]->size;?></h2></div>
							
						<?php }

					}else{ ?>
						<div style="padding:20px;float:right;width:100%;background:black; margin-top:20px;text-align:center;">
						<h2 style="color:white;">Advertisment here <?php echo $position[10]->size;?></h2></div>
							
					<?php } 
					?>

				
			</div>
			<div class="col-sm-12" style="" id="col_design">
				<div class="news_title">
					<p>ALSO SEE</p>
				</div>

				<div class="archive_design">
					<?php 
						$counts=0;
						if (count($also_see)): foreach ($also_see as $also_se): 
					 	
					 		echo get_excerpt_archive($also_se); 
					 		$counts++;
					 		if($counts == 3){
					 			echo "<hr style='width:100%;'>";
					 			$counts =0;
					 		}
					 		endforeach; endif; 
					 	?>
				</div>
		
			<?php
				$position = array();
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							
					endforeach; endif; 
					$count = 0;
					
					if (count($ads)){

						foreach ($ads as $ad){

							if($position[11]->p_id == $ad->position && $ad->status==1){ ?>

								<img style="float:right;width:100%; margin-top:20px;" src="<?php echo base_url('images/'.$ad->img);?>"/>
								<?php $count++;
							}

						}

						if($count==0) { ?>

							<div style="padding:20px;float:right;width:100%; background:black;margin-top:20px;text-align:center;">
							<h2 style="color:white;">Advertisment here <?php echo $position[11]->size;?></h2></div>
							
						<?php }

					}else{ ?>
						<div style="padding:20px;float:right;width:100%;background:black; margin-top:20px;text-align:center;">
						<h2 style="color:white;">Advertisment here <?php echo $position[11]->size;?></h2></div>
							
					<?php } 
					?>

				</div>
		</div>
	</div>
	<div class="span3 sidebar">
			<?php $this->load->view('sidebar'); ?>
	 </div>
</div>