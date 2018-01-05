<?php if(is_allowed('Admin')){ ?>
<section style="margin-bottom:100px;">
	<h2>Order Pages</h2>
	<p class="alert alert-info">Drag to order pages and then click 'Save'</p>
	
	<div class="col-sm-12">
		<div id="orderResult" class="col-sm-6" style="margin-top:-50px;">
			<!-- this is where we will display our sortable list  -->


		</div>
	</div>
	<input type="button" id="save" value="Save" class="btn btn-primary"/>
</section >
<script type="text/javascript">
	// its time for some ajax
	$(function(){
		$.post('<?php echo base_url('admin/page/order_ajax'); ?>',{},function(data){
			$('#orderResult').html(data);
		});
		$('#save').click(function(){
			var oSortable=$('.sortable').nestedSortable('toArray');
			$('#orderResult').slideUp(function(){
				$.post('<?php echo base_url('admin/page/order_ajax'); ?>',{sortable:oSortable},function(data){
				$('#orderResult').html(data);
				$('#orderResult').slideDown();
			});
			});
			
		});
	});
</script>
<?php } else{

	redirect('admin/dashboard/resultnotfound');

}?>