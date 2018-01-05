<section>
	<h2>Articles Comments </h2>
	<hr/>
	<p><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Comments in response to</p>
	<h1>

		<?php echo $this ->data['articles']->title;  // this is for title?>
	</h1><hr>

	<?php
		//helpers functon reused to retrive the comments according to the id of article
		$comment = array_slice($comment, 0); 
		echo get_comment($comment,$this ->data['articles']->id); 
	?>
</section>
<script>
	
	// function showButton(id){

	// 	//alert("hello");
	// 	$('.c_delete_'+id).css('visibility','visible');


	// }


</script>