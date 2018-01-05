<!-- Main content -->
<div class="row">
	<div class="col-sm-12" style="">
		<div class="category_homepage">
								
			<p><?php echo strtoupper(e($article->category));?></p>
		</div>
		<h2 style="color:black;margin-top:45px;font-size:45px;font-weight:bold;"><?php 	echo e($article->title); ?></h2>
		<hr>
	</div>
	<div class="col-sm-9" style="">
		<div class="row" style="">
 			<div class="span9">
				<article>
					<div class="col-sm-12" id="col_design">
						
						<p class="pubdate" style="color:gray;"><?php echo "<i class='fa fa-clock-o'aria-hidden='true'></i>&nbsp;".e($article->pubdate);?>,&nbsp;News++ Daily</p><hr/>
						 <?php 
							 if(e($article->userfile)){
							 	echo '<img src="'.base_url('images/'.$article->userfile).'"/>';
							 }
							 echo "<p style='margin-top:15px;'>".$article->body."</p>"; 
						  ?> 
						  <hr/>
						  	<div class="fb-share-button" data-href="<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>&amp;src=sdkpreparse">Share</a></div>
						  	<a class="btn btn-info"  
						  		style="padding:2px 10px;margin-top:-9px;font-weight:bold;text-aligh:center;"
							  href="https://twitter.com/intent/tweet?text=<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>"
							  target="_blank"
							  data-size="large">
							Tweet</a>
						  <hr/>
						  <div id="fb-root"></div>
							<script>
								(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));
							</script>

							<div class="comment_box" >
								<div class="fb-comments" data-href="<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" data-width="100%" data-numposts="5"></div>
								<p>&nbsp;&nbsp;&nbsp;Don't have facebook account, comment below</p>

								<form id="commentform">
									<table border="0" cell-padding="5" style="width:100%;">
										<tr >
											<td style="padding-left:10px;padding-right:10px;" ><input type="hidden" id="p_id" name="p_id" placeholder="Your full name" required value="<?php echo $article->id;?>"/></td>
										</tr>
										<tr >
											<td style="padding-left:10px;padding-right:10px;" >
												<input type="text" id="c_name" name="c_name" onblur="check(this.id)" placeholder="Your full name" required class="comment_field"/>
												<span id="c_name_error" style="color:red;font-size:12px;"></span>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;padding-right:10px;">
												<input type="email" id="c_email" onblur="check(this.id)" name="c_email" placeholder="Email" required class="comment_field"/>
												<span id="c_email_error" style="color:red;font-size:12px;"></span>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px;padding-right:10px;">
												<textarea type="text" id="body" name="body" onblur="check(this.id)" placeholder="Comment" required class="comment_field"></textarea>
												<span id="body_error" style="color:red;font-size:12px;"></span>
											</td>
										</tr>
										<tr >
											
											<td style="float:right; padding:8px; padding-left:10px;padding-right:10px">
												<input  type="submit" class="btn  btn-primary" id="submit_enquiry" name="submit_enquiry" value="Comment" />
											</td>
										</tr>
									</table>		
								</form>

								<div >
									<div id="cmnts"></div>
									
									<?php $comment = array_slice($comment, 0); ?>
									<?php echo get_comment($comment); ?>
								</div>
							</div>
						</div>
				</article>
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
				
				
			</div>
 			</div>
 		</div>

 	</div>
 	<!-- Sidebar -->
	<div class="span3 sidebar">

		<?php  $this->load->view('sidebar'); ?>;

	</div>
</div>
<div id="fb-root"></div>
<script>
	
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


    autosize(document.querySelectorAll('textarea'));
 
</script>

<script>

	function check(id){
		
		document.getElementById(id+'_error').innerHTML = "";
		
	}
</script>
<script>
	

    $(function(){
        $( "#submit_enquiry" ).click(function(event)
        {
            event.preventDefault();//prevent auto submit data

            var p_id= $("#p_id").val();
            var c_name= $("#c_name").val();
            var c_email= $("#c_email").val();
            var comment= $("#body").val();

            if(c_name ==""){
            	
            	$('#c_name_error').text('Name is required.');
            	return false;
            }
            if(c_email ==""){
            	
            	$('#c_email_error').text('Email is required.');
            	return false;
            }
            if(comment ==""){
            	
            	$('#body_error').text('Comment is required.');
            	return false;
            }
            //assign our rest of variables

            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>article/ajax_comment",//URL changed 
                    data:{ 'p_id':p_id, 'c_name':c_name,'c_email':c_email,'body':comment},
                    success:function(data)
                    {
                        
                        $('#c_name, #c_email, #body').val('');
                        recentComment(c_name,comment);

                    	//$('#commentform')[0].reset();
                        console.log(data);
                    }
                });
        });


		function getData(id){
			$.ajax({
		        url:"<?php echo base_url();?>/article/getComments/"+id,
		        dataType:'text',
		        type:"POST",
		        success: function(result){
		            var obj = $.parseJSON(result);
		            console.log(obj);
		           $.each(obj,function(index,object){
		                $('ul').append('<li>' +object['c_name']+ '</li>');
		            })
		        }
		    })
		    $('#comments_from_post').toggle(900)
		}
    });

	function recentComment(name,comment){
		document.getElementById('cmnts').innerHTML = "<div class='comments'><p style='font-weight:bold;color:#1a75ff;'>"+name+"</p><p>"+comment+"</p></div>";
		
		//$('#cmnts').html(comment.replace(/\r?\n/g,'<br/>'));
	}
</script>