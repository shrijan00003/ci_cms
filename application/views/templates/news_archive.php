<!-- Main content -->
<div class="row">
	<div class="col-sm-9"style="background:white;">
		<div class="row">
			<div class="col-sm-12" style="" id="col_design">
				<div class="news_title">
					<p><?php echo strtoupper($this->uri->segment(1)); ?></p>
				</div>

				<div class="archive_design">
					<?php 
						$counts=0;
						if (count($articles)): foreach ($articles as $article): 
					 	
					 		echo get_excerpt_archive($article); 
					 		$counts++;
					 		if($counts == 3){
					 			echo "<hr style='width:100%;'>";
					 			$counts =0;
					 		}
					 		endforeach; endif; 
					 	?>
				</div>
				
				<?php if($pagination): ?>
							<div class="pagination" style="float:right;margin-top:-20px;"><?php echo $pagination; ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>		
	<!-- Sidebar -->
	 <div class="span3 sidebar">
			<?php $this->load->view('sidebar'); ?>
	 </div> 	
</div>	