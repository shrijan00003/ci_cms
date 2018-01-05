<?php if(is_allowed('Admin')){ ?>
<section>
	<h2>Advertisment Positions</h2>
	<hr/>


	
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Modal Header</h4>
		        </div>
		        <div class="modal-body">
		          	<p>Ads Price setting</p>


		          	<?php echo form_open(); ?>
						<table class="table">
							
							<tr>
								<input type="hidden" name="id" id="a_id"/>
								<td><input type="text" name="position" id="positions"  onblur="check(this.id)"/></td>
								<td><span id="c_positions_error" style="color:red;"></span></td>
							</tr>
							<tr>
								<td><input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="price_per_day" id="price_per_day"  onblur="check(this.id)"/></td>
								<td><span id="c_price_per_day_error" style="color:red;"></span></td>
							</tr>
							<tr>
								<td><input type="text" name="size" id="size"  onblur="check(this.id)"/></td>
								<td><span id="c_size_error" style="color:red;"></span></td>
							</tr>

							<tr>
								<td><input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="available" id="available"  onblur="check(this.id)"/></td>
								<td><span id="c_available_error" style="color:red;"></span></td>
							</tr>
							
						</table>		
						<?php echo form_close(); ?>

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" id="submit_enquiry" data-dismiss="modal">Update</button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        </div>
		      </div>
		      
		    </div>
	  	</div>


	  	<div class="modal fade" id="myModal2" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Modal Header</h4>
		        </div>
		        <div class="modal-body">
		          	<p>Add new advertisment</p>


		          
		          	<form method="POST" class="myForm" enctype="multipart/form-data">
 						<table class="table">
							
							<tr>
								<input type="hidden" name="id_ads" id="ads_id"/>
								<input type="hidden" name="price_per_day_ads" id="price_per_day_ads"/>
								<td><input type="file" name="image" id="image" onblur="check(this.id)" /></td>
								<td><span id="c_image_error" style="color:red;"></span></td>
							</tr>
							<tr>
								<td><input type="text" placeholder="Enter duration." class="add_ads" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="duration" id="duration"  onblur="check(this.id)"/></td>
								<td><span id="c_duration_error" style="color:red;"></span></td>
							</tr>
							<tr>
								<td><input type="text" placeholder="Enter customer name/company." class="add_ads" name="customer" id="customer" onblur="check(this.id)"/></td>
								<td><span id="c_customer_error" style="color:red;"></span></td>
							</tr>
							<tr>
								<td><input type="phone" placeholder="Enter phone no of customer." class="add_ads" name="phone" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="phone" onblur="check(this.id)"/></td>
								<td><span id="c_phone_error" style="color:red;"></span></td>
							</tr>
							
						</table>		
					</form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" id="submit_enquiry2" data-dismiss="modal">Add</button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        </div>
		      </div>
		      
		    </div>
	  	</div>
	
	<table class="table table-striped" id="newsTable">
		<thead>
			<tr>
				<th onclick="sortTable(0)" width="250" >Positions   &nbsp;&nbsp;<i class="fa fa-sort" aria-hidden="true"></i></th>
				<th  style="text-align:center;">Price perday   &nbsp;&nbsp;</th>
				<th  style="text-align:center;">Size   &nbsp;&nbsp;</th>
				<th  style="text-align:center;">Availability   &nbsp;&nbsp;</th>
				


				<th>Add New ads</th>
				<th>Edit Positions</th>
				<!--<th>Delete</th>-->
			</tr>
		</thead>
		<tbody>
		<?php if(count($positions)): foreach($positions as $pos): ?>
			<tr>
				<td><?php echo $pos->position; ?></td>
				<td style="text-align:center;"><?php echo $pos->price_per_day; ?></td>
				<td style="text-align:center;"><?php echo $pos->size; ?></td>
				<?php if($pos->available > 0){?>
					<td style="text-align:center;"><?php echo $pos->available; ?></td>

					<?php } else{?>
					<td style="text-align:center;">N/A</td>

				<?php }?>

				<?php if($pos->available > 0){?>
					<td style="text-align:center;"><a href="javascript:addAds(<?php echo $pos->p_id;?>,<?php echo $pos->price_per_day;?>)" class="glyphicon glyphicon-plus " ></a>

					<?php } else{?>
					<td style="text-align:center;">N/A</td>

				<?php }?>
				<td style="text-align:center;"><a href="javascript:setId(<?php echo $pos->p_id;?>,'<?php echo $pos->position;?>','<?php echo $pos->price_per_day;?>','<?php echo $pos->size;?>',<?php echo $pos->available;?>)" class="glyphicon glyphicon-edit " ></a>

				</td>
				
				<!--<td style="text-align:center;"><?php //echo btn_delete('admin/advertisment/delete_ads/'.$pos->p_id); ?></td>-->
			</tr>
		<?php endforeach; ?>
		<?php else:  ?>
			<tr>
				<td colspan="3">We could not find any articles</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>



</article>

<?php } else{

	redirect('admin/dashboard/resultnotfound');

}?>
<script>
	function filterFunction() {
	  var input, filter, table, tr, td, i,filterby;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("newsTable");
	  tr = table.getElementsByTagName("tr");
	  filterby = document.getElementById("selectbox").value;
	  for (i = 0; i < tr.length; i++) {
		if(filterby =="title"){
			td = tr[i].getElementsByTagName("td")[0];
		}else if(filterby =="date"){
			td = tr[i].getElementsByTagName("td")[1];
		}else if(filterby =="category"){
			td = tr[i].getElementsByTagName("td")[2];
		}
		if (td) {
		  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	}
	
	function sortTable(n) {
	  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	  table = document.getElementById("newsTable");
	  switching = true;
	  //Set the sorting direction to ascending:
	  dir = "asc"; 
	  /*Make a loop that will continue until
	  no switching has been done:*/
	  while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.getElementsByTagName("TR");
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i < (rows.length - 1); i++) {
		  //start by saying there should be no switching:
		  shouldSwitch = false;
		  /*Get the two elements you want to compare,
		  one from current row and one from the next:*/
		  x = rows[i].getElementsByTagName("TD")[n];
		  y = rows[i + 1].getElementsByTagName("TD")[n];
		  /*check if the two rows should switch place,
		  based on the direction, asc or desc:*/
		  if (dir == "asc") {
			if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
			  //if so, mark as a switch and break the loop:
			  shouldSwitch= true;
			  break;
			}
		  } else if (dir == "desc") {
			if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
			  //if so, mark as a switch and break the loop:
			  shouldSwitch= true;
			  break;
			}
		  }
		}
		if (shouldSwitch) {
		  /*If a switch has been marked, make the switch
		  and mark that a switch has been done:*/
		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		  //Each time a switch is done, increase this count by 1:
		  switchcount ++;      
		} else {
		  /*If no switching has been done AND the direction is "asc",
		  set the direction to "desc" and run the while loop again.*/
		  if (switchcount == 0 && dir == "asc") {
			dir = "desc";
			switching = true;
		  }
		}
	  }
	}


	function setId(id,positions,price_per_day,size,available){

		$('#myModal').modal('show');
	
	//alert(id+positions+price_per_day+size);
		document.getElementById("a_id").value=id;	
		document.getElementById("positions").value=positions;	
		document.getElementById("price_per_day").value=price_per_day;	
		document.getElementById("size").value=size;	
		document.getElementById("available").value=available;	
			
		//alert(id);
		//document.getElementById('a_id').value="hwehghwefgh";
	}
	function addAds(id,price_per_day){

		$('#myModal2').modal('show');
	
		//alert(id);
	//alert(id+positions+price_per_day+size);
		document.getElementById("ads_id").value=id;	
		document.getElementById("price_per_day_ads").value=price_per_day;
			
			
		//alert(id);
		//document.getElementById('a_id').value="hwehghwefgh";
	}


</script>
<script type="text/javascript">

 $(function(){
        $( "#submit_enquiry" ).click(function(event)
        {
            event.preventDefault();//prevent auto submit data

            var id= $("#a_id").val();
            var positions= $("#positions").val();
            var price_per_day= $("#price_per_day").val();
            var size= $("#size").val();
            var available= $("#available").val();

            if(price_per_day ==""){
            	
             	$('#c_price_per_day_error').text('Price per day is required.');
             	return false;
            }
             if(available ==""){
            	
             	$('#c_available_error').text('Available space is required.');
             	return false;
            }
            if(positions ==""){
            	
             	$('#c_positions_error').text('Possitions is required.');
             	return false;
            }
            if(size ==""){
            	
             	$('#c_size_error').text('Size of ads is required.');
             	return false;
            }
            // if(comment ==""){
            	
            // 	$('#body_error').text('Comment is required.');
            // 	return false;
            // }
            //assign our rest of variables


            //this ajax for sending update data in price table in background
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>/admin/advertisment/edit",//URL changed 
                    data:{ 'id':id, 'position':positions,'price_per_day':price_per_day,'size':size,'available':available},
                    success:function(data)
                    {
                        
                        //$('#c_name, #c_email, #body').val('');
                       // recentComment(c_name,comment);
                        //alert(id+positions+price_per_day+size);
                    	//$('#commentform')[0].reset();
                    	window.location.replace("<?php echo base_url(); ?>admin/advertisment/positions");//redirect to new url
                        console.log(data);
                    }
                });
        });


		//ajax for adding advertisments
		$( "#submit_enquiry2" ).click(function(event)
        {
            event.preventDefault();//prevent auto submit data

            var id= $("#ads_id").val();
            var image= $("#image").val();
            var duration= $("#duration").val();
            var price_per_day_ads= $("#price_per_day_ads").val();
            var customer= $("#customer").val();
            var phone= $("#phone").val();

            

            if(image ==""){
            	
            	$('#c_image_error').text('Image is required.');
            	return false;
            }
            if(duration ==""){
            	
            	$('#c_duration_error').text('Duration is required.');
            	return false;
            }
            if(customer ==""){
            	
            	$('#c_customer_error').text('Please enter customer name.');
            	return false;
            }
            if(phone ==""){
            	
            	$('#c_phone_error').text('Please enter customer phone no.');
            	return false;
            }else if(phone.length<10){
            	
            	$('#c_phone_error').text('Phone number is invalid. Re-enter.');
            	return false;
            }else if(phone.length>12){
            	
            	$('#c_phone_error').text('Phone number is invalid. Re-enter.');
            	return false;
            }





            // }else if(Number.isInteger(duration)){
            // 	$('#c_duration_error').text('Duration should be integer value.');
            // 	return false;
            // }
            
            //assign our rest of variables


            //this ajax for sending update data in price table in background
            var formData = new FormData($('.myForm')[0]);
            $.ajax(
                {
                    type:"post",

                    url: "<?php echo base_url(); ?>/admin/advertisment/add_ads",//URL changed 
                   	data: formData,
                	mimeType: "multipart/form-data",
                	contentType: false,
                	cache: false,
                	processData: false,
                    //data:{ 'image':image,'position':id,'duration':duration,'price_per_day_ads':price_per_day_ads},
                    success:function(data)
                    {
                       
                    	//alert(image+id+duration+price_per_day_ads);
                    	window.location.replace("<?php echo base_url(); ?>admin/advertisment/viewads");//redirect to new url
                        console.log(data);
                    }
                });
        });
	 });

	function check(id){
		
		document.getElementById('c_'+id+'_error').innerHTML = "";
		
	}
</script>

